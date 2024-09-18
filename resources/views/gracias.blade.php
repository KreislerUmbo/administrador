<x-app-layout>
    <div class="pt-12">
        <img class="max-w-4xl mx-auto " src="img/gracias.jpg" alt="">
        @if (session('niubiz'))
            @php
                $response=session('niubiz')['response'];

            @endphp
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 mt-8 dark:text-green-400" role="alert">
            <p class="mb-4">
                {{$response['dataMap']['ACTION_DESCRIPTION']}}
            </p>
            <P>
                <b>Numero de Pedido: </b>
                    {{$response['order']['purchaseNumber']}}          
            </P>
            <p>
                <b>fecha y Hora del Pedido</b>
                
                {{ now()->createFromFormat('ymdHis', $response['dataMap']['TRANSACTION_DATE'])->format('d-m-Y H:i:s')}}
            </p>
            <p>
                <b>Tarjeta:</b>
                {{ $response['dataMap']['CARD']}} ({{ $response['dataMap']['BRAND']}})
            </p>
            <p>
                <b>Importe:</b>
                {{ $response['order']['amount']}}  {{ $response['order']['currency']}} 
            </p>
              </div>
        @endif
    </div>


</x-app-layout>