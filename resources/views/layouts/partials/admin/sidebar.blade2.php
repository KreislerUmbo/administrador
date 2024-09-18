@php
    $linksPadre = [
        'MANTENIMIENTO' => [
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Paises',
            'icon' => 'fa-solid fa-globe',
            'route' => route('admin.countries.index'),
            'active' => request()->routeIs('admin.countries.*'),
        ],
        'TURISMO' => [
            'name' => 'Destinos',
            'icon' => 'fa-solid fa-filter',
            'route' => route('admin.destinos.index'),
            'active' => request()->routeIs('admin.destinos.*'),
        ],
        [
            'name' => 'PORTADA',
            'icon' => 'fa-solid fa-images',
            'route' => route('admin.covers.index'),
            'active' => request()->routeIs('admin.covers.*'),
        ],
    ];

    /*$links = [
        [
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Paises',
            'icon' => 'fa-solid fa-globe',
            'route' => route('admin.countries.index'),
            'active' => request()->routeIs('admin.countries.*'),
        ],
        [
            'name' => 'Ciudades',
            'icon' => 'fa-solid fa-building',
            'route' => route('admin.cities.index'),
            'active' => request()->routeIs('admin.cities.*'),
        ],
        [
            'name' => 'Familias',
            'icon' => 'fa-solid fa-box-open',
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*'),
        ],
        [
            'name' => 'Categorias',
            'icon' => 'fa-solid fa-tags',
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
        ],
        [
            'name' => 'Subcategorias',
            'icon' => 'fa-solid fa-layer-group',
            'route' => route('admin.subcategories.index'),
            'active' => request()->routeIs('admin.subcategories.*'),
        ],
        [
            'name' => 'Productos',
            'icon' => 'fa-solid fa-box-open',
            'route' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*'),
        ],
        [
            'name' => 'Opciones',
            'icon' => 'fa-solid fa-filter',
            'route' => route('admin.options.index'),
            'active' => request()->routeIs('admin.options.*'),
        ],
        [
            'name' => 'Destinos',
            'icon' => 'fa-solid fa-filter',
            'route' => route('admin.destinos.index'),
            'active' => request()->routeIs('admin.destinos.*'),
        ],
        [
            'name' => 'PORTADA',
            'icon' => 'fa-solid fa-images',
            'route' => route('admin.covers.index'),
            'active' => request()->routeIs('admin.covers.*'),
        ],
    ];*/

@endphp
<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($linksPadre as $link => $hijos)
                <li>
                    {{ $link }}
                </li>
                <ul>
                    @foreach ($hijos as $hijo)
               
               <li>{{$hijo}}</li>
                
                @endforeach
            </ul>
            @endforeach
        </ul>
    </div>
</aside>
