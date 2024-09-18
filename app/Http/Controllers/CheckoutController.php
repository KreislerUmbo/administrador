<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        $access_token = $this->generateAccesToken();
        $session_token = $this->generateSessionToken($access_token);

        return view('checkout.index', compact('session_token'));
    }


    public function generateAccesToken()
    {
        $url_api = config('services.niubiz.url_api') . '/api.security/v1/security';
        $user = config('services.niubiz.user');
        $password = config('services.niubiz.password');

        $auth = base64_encode($user . ':' . $password);

        return Http::withHeaders([
            'Authorization' => 'Basic ' . $auth,
        ])->get($url_api)
            ->body();
    }

    public function generateSessionToken($access_token)
    {
        $merchant_id = config('services.niubiz.merchant_id');
        $url_api = config('services.niubiz.url_api') . "/api.ecommerce/v2/ecommerce/token/session/{$merchant_id}";

        $reponse = Http::withHeaders([
            'Authorization' => $access_token,
            'Content-Type' => 'application/json',
        ])->post($url_api, [
            'channel' => 'web',
            'amount' => Cart::instance('shopping')->subtotal() + 5,
            'antifraud' => [
                'clientIp' => request()->ip(),
                'merchantDefineData' => [
                    'MDD15' => 'value15',
                    'MDD20' => 'value20',
                    'MDD33' => 'value33',
                ]
            ]
        ])
            ->json();

        return $reponse['sessionKey'];
    }

    public function paid(Request $request)
    {
        $access_token = $this->generateAccesToken();
        $merchant_id = config('services.niubiz.merchant_id');
        $url_api = config('services.niubiz.url_api') . "/api.authorization/v3/authorization/ecommerce/{$merchant_id}";

        $reponse = Http::withHeaders([
            'Authorization' => $access_token,
            'Content-Type' => 'application/json',

        ])->post($url_api, [
            "channel" => "web",
            "captureType" => "manual",
            "countable" => true,
            "order" => [
                'tokenId' => $request->transactionToken,
                'purchaseNumber' => $request->purchaseNumber,
                "amount" => $request->amount,
                "currency" => "PEN",
            ]
        ])->json();

        session()->flash('niubiz', [
            'response' => $reponse,
            'purchaseNumber' => $request->purchaseNumber,
        ]);

        //decimos si tenemos una respuesta tipo 000 quiere decir que fue aceptado la tarjeta
        if (isset($reponse['dataMap']) && $reponse['dataMap']['ACTION_CODE'] == '000') {

            //sacamos la direccion  del cliente que lo señalo como principal o por defecto
            $address = Address::where('user_id', auth()->id())
                ->where('default', true)
                ->first();
            //generamos la orden de la compra inserando en la tabla orders 
            Order::create([
                'user_id' => auth()->id(),
                'content' => Cart::instance('shopping')->content(),
                'address' =>  $address,
                'payment_id' => $reponse['dataMap']['TRANSACTION_ID'],
                'total' => Cart::subtotal()+5,
            ]);
            //destruimos el carrito con destroy depues que se generó la orden
            Cart::destroy();
            // luego redireccion al mensaje de gracias
            return redirect()->route('gracias');
        }
        return redirect()->route('checkout.index');
    }
}
