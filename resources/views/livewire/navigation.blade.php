<div x-data="{
    open: false,
}">
    <header class="bg-purple-600">
        <x-container class="px-4 py-4">
            <div class=" flex justify-between items-center space-x-8">
                <button class="text-xl md:text-3xl" x-on:click="open=true">
                    <i class="fas fa-bars text-white"></i>
                </button>
                <h1 class=" text-white">
                    <a href="/" class=" inline-flex flex-col items-end">
                        <span class=" text-xl md:text-3xl leading-4 md:leading-6 font-semibold">
                            UMBOSYSTEM
                        </span>
                        <span class=" text-xs">
                            Tienda Online
                        </span>
                    </a>
                </h1>
                <div class="flex-1 hidden md:block">
                    <x-input oninput="search(this.value)" class="w-full" placeholder="Buscar por Producto" />
                    {{-- buscador --}}
                </div>
                <div class=" flex items-center space-x-2 md:space-x-8">
                    <x-dropdown>
                        <x-slot name="trigger">

                            @auth {{-- esta directiva auth muestra en caso que se haya iniciado session que paresca la foto de perfil --}}
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="text-xl md:text-3xl">
                                    <i class="fas fa-user text-white"></i>{{-- icono carrito user --}}
                                </button>
                            @endauth

                        </x-slot>

                        <x-slot name="content">

                            @guest {{-- la directiv a guest solo muestra en caso que le ususarios no haya inciado ssesion --}}
                                <div class="px-4 py-2">
                                    <div class=" flex justify-center">
                                        <a href="{{ route('login') }}" class="btn btn-purple">
                                            Iniciar Sesion
                                        </a>
                                    </div>
                                    <p class=" text-sm text-center mt-2">
                                        ¿No tienes cuenta? <a href="{{ route('register') }}"
                                            class="text-purple-600 hover:underline">Regístrate</a>
                                    </p>
                                </div>
                            @else
                                {{-- en caso que haya iniciado seesion debe aparecer el perfil --}}

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Mi Perfil
                                </x-dropdown-link>
                                <div class=" border-t border-gray-200"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Finalizar Sesión') }}
                                    </x-dropdown-link>
                                </form>
                            @endguest
                        </x-slot>

                    </x-dropdown>


                    <a href="{{route('cart.index')}}" class="relative">
                        <i class="fas fa-shopping-cart text-xl md:text-3xl text-white"></i>{{-- icono carrito compras --}}
                        <span id="cart-count"
                            class="absolute -top-2 -end-4 inline-flex items-center justify-center w-6 h-6 bg-red-500  rounded-full text-xs font-bold text-white">
                            {{ Cart::instance('shopping')->count() }}
                        </span>
                    </a>
                </div>

            </div>
            <div class=" mt-4 md:hidden">
                <x-input oninput="search(this.value)" class="w-full" placeholder="Buscar por Producto" />
                {{-- otro buscador para pantallas pequeñas --}}
            </div>
        </x-container>
    </header>
    <div x-show="open" x-on:click="open=false" style="display:none"
        class=" fixed top-0 left-0 inset-0 bg-black bg-opacity-25 z-10"></div> {{-- pantalle negra --}}

    {{-- menu lateral izquierda --}}
    <div x-show="open" style="display:none" class=" display:none fixed top-0 left-0 z-20">
        <div class="flex">
            <div class=" w-screen md:w-80  h-screen bg-white">
                <div class=" bg-purple-600 px-4 py-3 text-white font-semibold">
                    <div class="flex justify-between items-center">
                        <span class=" text-lg">
                            Hola
                        </span>
                        <button x-on:click="open=false">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="h-[calc(100vh-52px)] overflow-auto">
                    <ul>
                        @foreach ($families as $family)
                            <li wire:mouseover="$set('family_id',{{ $family->id }})">
                                <a href="{{ route('families.show', $family) }}"
                                    class=" flex items-center justify-between px-4 py-4 text-gray-700 hover:bg-purple-200">
                                    {{ $family->name }}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="w-80 xl:w-[57rem] pt-[52px] hidden md:block">
                <div class=" bg-white h-[calc(100vh-52px)] overflow-auto px-6 py-8">
                    <div class=" mb-8 flex justify-between items-end">
                        <p class="border-b-[3px] border-lime-400 uppercase text-xl font-semibold pb-1">
                            {{ $this->familyName }}
                        </p>
                        <a href="{{ route('families.show', $family_id) }}" class="btn btn-purple">
                            Ver todo
                        </a>
                    </div>
                    <ul class=" grid grid-cols-1 xl:grid-cols-3 gap-8">
                        @foreach ($this->categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}"
                                    class=" text-purple-600 font-semibold text-lg">
                                    {{ $category->name }}
                                </a>
                                <ul class="mt-4 space-y-2">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li>
                                            <a href="{{ route('subcategories.show', $subcategory) }}"
                                                class="text-sm text-gray-700 hover:text-purple-600">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            Livewire.on('cartUpdated', (count) => {
                document.getElementById('cart-count').innerText = count;
            });

            function search(value) {
                Livewire.dispatch('search', {
                    search: value
                })
            }
        </script>
    @endpush
</div>
