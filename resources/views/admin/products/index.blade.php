<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'New Product',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.products.create') }}">
            Nuevo Productos
        </a>
    </x-slot>

    @if ($products->count())
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SKU
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PRODUCTOS
                    </th>

                    <th scope="col" class="px-6 py-3">
                        PRECIO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SUBCATEGORIA
                    </th>
                    <th scope="col" class=" px-6 py-3 justify-end space-x-2">
                        ACTION
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $product->sku }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $product->name }}
                        </th>
                        <th class="px-6 py-4">
                            {{ $product->price }}
                        </th>
                        <th class="px-6 py-4">
                            
                        </th>

                        <th class="flex justify-end space-x-2">
                            <a class="btn btn-blue" href="{{ route('admin.products.edit', $product) }}">Editar</a> 
                           <a class="btn btn-red" onclick="confirmDelete()">
                                Delete
                            </a>


                            <form  action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
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
        {{ $products->links() }}
    </div>

    @else
    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Lista Vacia!</span> No existen Productos  Registrados.
        </div>
    </div>
@endif


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