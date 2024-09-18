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
        'name' => 'Registrar Nuevo País',
    ],
]">
    <div class="card">
        <x-validation-errors class="mb-4" />
        <form action="{{ route('admin.countries.store') }}" method="POST">
            @csrf
            <div
                class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto sm:grid-cols-2 ">
                <div class="mb-2">
                    <x-label class=" mb-2 text-left font-semibold">
                        Código Pais
                    </x-label>
                    <x-input class=" w-full" placeholder="Ingrese el codigo del pais" name="codpais"
                        value="{{ old('codpais') }}" />
                </div>
                <div class="mb-2">
                    <x-label class=" mb-2 text-left font-semibold">
                        Abreviatura Pais
                    </x-label>
                    <x-input class=" w-full" placeholder="Ingrese Abreviatura del País" name="abrev"
                        value="{{ old('abrev') }}" />
                </div>
            </div>
            <div  class="grid max-w-screen-xl  gap-2 p-2 mx-auto">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre del País
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre del País" name="name"
                    value="{{ old('name') }}" />
            </div>

            <div>
                <x-button class="px-5 py-3 flex justify-items-center">Registrar</x-button>
            </div>

        </form>
    </div>

</x-admin-layout>
