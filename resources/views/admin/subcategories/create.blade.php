<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorias',
        'route' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
  {{--  <form action="{{ route('admin.subcategories.store') }}" method="POST">
        @csrf
        <div class="card">
            <x-validation-errors class="mb-4" />

            <div class="mb-4">

                <x-label class="mb-4">
                    Categorías
                </x-label>

                <x-select name="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            @selected(old('category->id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>

            </div>

            <div class="mb-4">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre de la Subcategoría
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre de la subcategoria" name="name"
                    value="{{ old('name') }}" />
            </div>
            <div class="mb-4">
                <a class="btn btn-orange" href="{{ route('admin.subcategories.index') }}">Regresar</a>
                <x-button class=" flex justify-end">Guardar</x-button>
            </div>
        </div>
    </form>
--}}

@livewire('admin.subcategories.subcategory-create')
</x-admin-layout>
