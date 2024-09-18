<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.categories.create') }}">
            Nueva Categoría
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
                        CATEGORÍAS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        FAMILIAS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->family->name }}
                        </td>

                        <td class="flex justify-end space-x-2">
                            <a class="btn btn-blue" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            <a class="btn btn-red" onclick="confirmDelete()">
                                Delete
                            </a>


                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                id="delete-form">
                                @csrf
                                @method('DELETE')

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links() }}
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
