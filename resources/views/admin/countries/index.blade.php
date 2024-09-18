<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Listado de Paises',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.countries.create') }}">
            Nuevo Pais
        </a>
    </x-slot>

    @if ($countries->count())
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Paises
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Abrev
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $country->id }}
                            </th>

                            <td class="px-6 py-4">
                                {{ $country->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $country->abrev }}
                            </td>

                            <td width="10px" class="flex  space-x-2">
                                <a class="btn btn-blue" href="{{ route('admin.countries.edit', $country) }}">Editar</a> 
                                <a class="btn btn-red" onclick="confirmDelete()">
                                     Delete
                                 </a>
     
                                 <form  action="{{ route('admin.countries.destroy', $country->id) }}" method="POST"
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
            {{ $countries->links() }}
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
                <span class="font-medium">Lista Vacia!</span> No existen Paises Registrados.
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
