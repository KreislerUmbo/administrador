<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Nva Subcategorias',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.subcategories.create') }}">
            Nueva Subcategoria
        </a>
    </x-slot>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SUBCATEGORIAS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CATEGORIAS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        FAMILIA
                    </th>
                    <th scope="col" class=" px-6 py-3 justify-end space-x-2">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $subcategory)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $subcategory->id }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $subcategory->name }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $subcategory->category->name }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $subcategory->category->family->name }}
                        </th>

                        <th class="flex justify-end space-x-2">
                            <a class="btn btn-blue" href="{{ route('admin.subcategories.edit', $subcategory) }}">Editar</a> 
                           <a class="btn btn-red" onclick="confirmDelete()">
                                Delete
                            </a>


                            <form  action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST"
                                id="delete-form">
                                @csrf
                                @method('DELETE')                               
                            </form>
                        </th>
                    </tr>             
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $subcategories->links() }}
    </div>


    @push('js')
     <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Estas Seguro?",
                    text: "No podras revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Borralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush

    </x-admin-layout>
