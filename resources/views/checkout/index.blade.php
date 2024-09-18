<x-app-layout>
    <div class="-mb-16 text-gray-700" x-data="{
        pago: 1
    }">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="col-span-1 bg-white">
                <div class=" lg:max-w-[40rem] py-12 px-4 lg:pr-8 sm:pl-6 lg:pl-8 ml-auto">

                    <h1 class="text-2xl font-semibold mb-2">
                        Pago
                    </h1>
                    <div class="shadow rounded-lg overflow-hidden border border-gray-400">
                        <ul class="divide-y divide-gray-400">
                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="1">
                                    <span class="ml-2">Tarjeta de debito / Crédito</span>
                                    <img class="h-6 ml-auto" src="img/credit-cards.png">
                                </label>

                                <div class="p-4 bg-gray-100 text-center border-t border-gray-400" x-show="pago==1">
                                    <i class="fa-regular fa-credit-card text-9xl"></i>
                                    <p class="mt-2">
                                        Luego de hacer click al "Pagar Ahora", se abrirá checkout de Niubiz para
                                        completar tu compra de forma segura
                                    </p>
                                </div>
                            </li>

                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="2">
                                    <span class="ml-2">Depósito Bancario o Yape</span>
                                    <img class="h-6 ml-auto" src="">
                                </label>
                                <div class="p-4 bg-gray-100 flex justify-center border-t border-gray-400" x-cloak
                                    x-show="pago==2">
                                    <div>
                                        <p>1.- Pago por deposito o transferencia bancaria</p>
                                        <p>- BCP soles: 550-8458955454-06</p>
                                        <p>- CCI: 002-50-8458955454-06</p>
                                        <p>- Razón Social: Umbosystem S.A.C</p>
                                        <p>- R.U.C:10443592861</p>
                                        <p>2.- Pago por Yape</p>
                                        <p>- Yape al numero 95091706(Kreisler Umbo Ruiz)</p>
                                        <p>
                                            Enviar el comprobante a +51 95091706
                                        </p>
                                    </div>
                                </div>

                            </li>




                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-span-1">
                <div class="lg:max-w[40rem] py-12 px-4 lg:pl-8 sm:pr-6 lg:pr-8 mr-auto">
                    <div class="mb-4 items-center bg-purple-600">
                        <label class=" font-bold text-white text-center">Resúmen del Pedido</label>
                    </div>
                    <ul class=" space-y-4 mb-4">
                        @foreach (Cart::instance('shopping')->content() as $item)
                            <li class="flex items-center space-x-4">
                                <div class="flex-shrink-0 relative">
                                    <img class="h-16 aspect-auto" src="{{ $item->options->image }}" alt="">
                                    <div
                                        class="flex justify-center items-center h-6 w-6 bg-gray-900 bg-opacity-70 rounded-full absolute -right-2 -top-2">
                                        <span class="text-white font-semibold">
                                            {{ $item->qty }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p>
                                        {{ $item->name }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <p>
                                        S/. {{ $item->price }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="flex justify-between">
                        <p>
                            Subtotal
                        </p>
                        <p>
                            S/. {{ Cart::instance('shopping')->Subtotal() }}
                        </p>
                    </div>
                    <div class="flex justify-between">
                        <p>
                            Precio de Envío
                            <i class="fas fa-info-circle" title="El precio de envío es de S/. 5.00"></i>
                        </p>
                        <p>
                            S/. 5.00
                        </p>
                    </div>

                    <hr class="my-3">
                    <div class="flex justify-between mb-4">
                        <p class="text-lg font-semibold">
                            TOTAL
                        </p>
                        <p>
                            S/. {{ Cart::instance('shopping')->Subtotal() + 5 }}
                        </p>
                    </div>
                    <div>
                        <button onclick="VisanetCheckout.open()" class="btn btn-purple w-full">
                            Finalizar Compra
                        </button>
                    </div>
                    @if (session('niubiz'))
                        @php
                            $niubiz = session('niubiz');
                            $response = $niubiz['response'];
                            $purchaseNumber = $niubiz['purchaseNumber'];
                        @endphp
                        @isset($response['data'])
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 mt-8"
                                role="alert">
                                <p class="mb-4">
                                    {{ $response['data']['ACTION_DESCRIPTION'] }}
                                </p>
                                <p>
                                    <b>Número de Pedido</b>
                                    {{ $purchaseNumber }}
                                </p>
                                <p>
                                    <b>Fecha y Hora del Pedido</b>
                                    {{ now()->createFromFormat('ymdHis', $response['data']['TRANSACTION_DATE'])->format('d-m-Y H:i:s') }}
                                </p>

                                @isset($response['data']['CARD'])
                                <p>
                                    <b>Tarjeta:</b>
                                    {{ $response['data']['CARD'] }} ({{ $response['data']['BRAND'] }})
                                </p>
                                @endisset

                            </div>
                        @endisset
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script type="text/javascript" src="{{ config('services.niubiz.url_js') }}"></script>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {

                let purchasenumber = Math.floor(Math.random() * 1000000000);

                let amount = {{ Cart::instance('shopping')->subtotal() + 5 }};

                VisanetCheckout.configure({
                    sessiontoken: '{{ $session_token }}',
                    channel: 'web',
                    merchantid: "{{ config('services.niubiz.merchant_id') }}",
                    purchasenumber: purchasenumber,
                    amount: amount,
                    expirationminutes: '20',
                    timeouturl: 'about:blank',
                    merchantlogo: 'img/comercio.png',
                    formbuttoncolor: '#000000',
                    action: "{{ route('checkout.paid') }}?amount=" + amount + "&purchaseNumber=" +
                        purchasenumber,
                    complete: function(params) {
                        alert(JSON.stringify(params));
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
