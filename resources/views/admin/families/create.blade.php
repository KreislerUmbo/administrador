<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => 'Nueva Familia',
    ],
]">
    <div class="card">
        <x-validation-errors class="mb-4"/>
        <form action="{{ route('admin.families.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre de Familia
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre de la familia" name="name"
                    value="{{ old('name') }}" />
            </div>

            <div >
                <x-button class="px-5 py-3 flex justify-items-center">Guardar</x-button>
            </div>

        </form>
    </div>

</x-admin-layout>