<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => 'Nueva Categoría',
    ],
]">

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="card">
            <x-validation-errors class="mb-4"/>

            <div class="mb-4">
                <x-label class="mb-2">
                    Famillia
                </x-label>

        <x-select name="family_id" class=" w-full">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre de Categoria
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre de la categoria" name="name"
                    value="{{ old('name') }}" />
            </div>
            <div>
                <x-button class=" flex justify-end">Guardar</x-button>
            </div>
        </div>
    </form>

</x-admin-layout>
