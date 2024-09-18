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
        'name' => 'Editar Categoría',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label class="mb-2">
                    Familia
                </x-label>

                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}" 
                            {{--@selected($category->family_id == $family->id) no me funciona esta directiva @select--}}
                            {{ $category->family_id == $family->id ? 'selected="selected"' : '' }}>                        
                            {{ $family->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class=" mb-2 text-left font-semibold">
                    Nombre de la Categoria
                </x-label>
                <x-input class=" w-full" placeholder="Ingrese el nombre de la Categoria" name="name"
                    value="{{ old('name', $category->name) }}" />
            </div>
            <div>
                <x-button class=" flex justify-end">Actualizar</x-button>
            </div>
        </form>

    </div>
</x-admin-layout>
