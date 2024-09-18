<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Paises',
        'route' => route('admin.countries.index'),
    ],
    [
        'name' => 'Modificar Registro del  País  ('.$country->name.')',
    ],
]">
    <div class="card">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('admin.countries.update',$country) }}" method="POST">
            @csrf
            @method('PUT')
            <div
                class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto sm:grid-cols-2 ">
                <div class="mb-2">
                    <x-label class=" mb-2 text-left font-semibold">
                        Código Pais
                    </x-label>
                    <x-input class=" w-full" placeholder="Ingrese el codigo del pais" name="codpais"
                        value="{{ old('codpais', $country->codpais)}}" />
                </div>
                <div class="mb-2">
                    <x-label class=" mb-2 text-left font-semibold">
                        Abreviatura Pais
                    </x-label>
                    <x-input class=" w-full" placeholder="Ingrese Abreviatura del País" name="abrev"
                        value="{{ old('abrev', $country->abrev) }}" />
                </div>
            </div>
            <div  class="grid max-w-screen-xl  gap-2 p-2 mx-auto">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre del País
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre del País" name="name"
                    value="{{ old('name', $country->name) }}" />
            </div>

            <div>
                <x-button class="px-5 py-3 flex justify-items-center">Actualizar</x-button>
            
            <a class=" justify-items-center inline-flex items-center px-5 py-3 bg-yellow-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 " href="{{route('admin.countries.index')}}">REGRESAR</a>
            </div>
        </form>
    </div>

</x-admin-layout>
