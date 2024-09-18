<div>


    <div class="card p-2">

        <div class="flex mb-4 ">
            <div class="w-2/3 p-2 text-center bg-white ">datos
                <div
                    class=" mb-4 grid max-w-screen-xl gap-2 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 ">
                    <!--divide en 3 columnas  -->
                    <div class="mb-2">
                        <x-label class=" mb-2 text-left font-semibold">
                            Código Destino
                        </x-label>
                        <x-input class=" w-full" placeholder="Ingrese el codigo del destino" name="codigo"
                            value="{{ old('codigodestino') }}" />
                    </div>

                    <div class="mb-2">
                        <x-label class=" mb-2 text-left font-semibold">
                            Tipo de Duración
                        </x-label>

                        <x-select class="w-full">
                            <option value="" disabled>
                                Seleccione Tipo de Duración
                            </option>
                            <option value="Full Day">Full Day</option>
                            <option value="Half Day<">Half Day</option>

                        </x-select>

                    </div>

                    <div class="mb-2">
                        <x-label class=" mb-2 text-left font-semibold">
                            Cant de Horas </x-label>
                        <x-input class=" w-full" placeholder="Ingrese el codigo del pais" name="codigo"
                            value="{{ old('codigo') }}" />
                    </div>
                </div>

                <div class="mb-4"><!--nombre del Destino  -->
                    <x-label class=" mb-2 text-left font-semibold">
                        Nombre del Destino
                    </x-label>
                    <x-input class=" w-full" placeholder="Ingrese el nombre del destino" name="nombredestino"
                        value="{{ old('nombredestino') }}" />
                </div>

                <div class="mb-4"><!--Resumen del Destino  -->
                    <x-label class=" mb-2 text-left font-semibold">
                        Resumen del Destino
                    </x-label>
                    <x-textarea rows="3" class=" w-full " placeholder="Ingrese un Resumen del Destino"
                        name="resumendestino" value="{{ old('resumendestino') }}" />
                </div>

                <div class="mb-4 "><!--Itinerario -->
                    <x-label class=" mb-2 text-left font-semibold">
                        Itinerario
                    </x-label>
                    <x-textarea rows="12" class="w-full  " placeholder="Ingrese el nombre del País" name="name"
                        value="{{ old('name') }}" />
                </div>

            </div>
            <div class="w-1/3 p-2 text-center bg-white ">imagenees
                <div>Anchura=800, Altura=600</div>
                <div class="rounded-lg lg:block">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg"
                        alt="Two each of gray, white, and black shirts laying flat." class="w-300 h-200  object-cover">
                </div>
                <div class="aspect-h-1 aspect-w-2 overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg"
                        alt="Model wearing plain gray basic tee." class="w-300 h-200  object-cover">
                </div>

            </div>

        </div>

        <div class="flex mb-4">
            <div class="w-1/2 p-2 text-center bg-gray-200">.w-1/2</div>
            <div class="w-1/2 p-2 text-center bg-gray-100">.w-1/2</div>
        </div>

        <div class="flex mb-4">
            <div class="w-1/2 p-2 text-center bg-blue-400">.w-1/2</div>
            <div class="w-1/4 p-2 text-center bg-blue-500">.w-1/4</div>
            <div class="w-1/4 p-2 text-center bg-blue-600">.w-1/4</div>
        </div>





        <div id="accordion-collapse" data-accordion="collapse">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span>Agregar Servicios INCLUIDOS en el Destino</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive
                        components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.
                    </p>
                    <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                            href="/docs/getting-started/introduction/"
                            class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start
                        developing websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>Servicios que NO INCLUYEN en el Destino</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>

        </div>

        <div class="mb-4 grid max-w-screen-xl gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 mt-2">
            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    Precio de Compra </x-label>
                <x-input type="number" step="0.01" class=" w-full" placeholder="Ingrese el precio de compra"
                    name="preciocompra" value="{{ old('preciocompra') }}" />
            </div>

            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    Precio de Venta X Unidad </x-label>
                <x-input type="number" step="0.01" class=" w-full" placeholder="Precio  Venta X Persona"
                    name="precioventa" value="{{ old('precioventa') }}" />
            </div>

            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    Precio para Mayorista </x-label>
                <x-input type="number" step="0.01" class="w-full" placeholder="Ingrese el Precio Mayoristas"
                    name="preciomayorista" value="{{ old('preciomayorista') }}" />
            </div>

            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    Precio de Oferta </x-label>
                <x-input type="number" step="0.01" class=" w-full" placeholder="Ingrese  Precio para  Oferta"
                    name="priceoferta" value="{{ old('priceoferta') }}" />
            </div>


        </div>

        <div class="mb-4 grid max-w-screen-xl gap-2 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4">
            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    País del Destino 
                </x-label>
                <x-select class=" w-full ">
                    <option value="" disabled>Seleccione un País</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">
                            {{ $pais->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">
                    Ciudad del Destino </x-label>
                <x-input type="number" step="0.01" class=" w-full" placeholder="Ingrese el Precio Mayoristas"
                    name="preciomayorista" value="{{ old('preciomayorista') }}" />
            </div>
            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold"> Elegir Hora de Incio</x-label>
                <x-input type="time" id="start-time" name="horainicial" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required 
                value="{{ old('horainicial') }}" />
            </div>
            <div class="mb-2">
                <x-label class=" mb-2 text-left font-semibold">Hora Final</x-label>
                <x-input type="time" id="start-time" name="horafinal" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required 
                value="{{ old('horafinal') }}" />
            </div>


        </div>



    </div>



</div>
