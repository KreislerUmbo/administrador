<div>
    <div class="flex">
        <div class="relative w-full">
            <input wire:model.live="search"
                class=" p-3 w-full  text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                placeholder="Buscar por Nombre de la Ciudad" required />

        </div>
    </div>

    @if ($cities->count())
        <div class="relative overflow-x-auto p-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ciudad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pais
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ACTION
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $city->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $city->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $city->country_id }}
                            </td>

                            <td width="10px" class="flex  space-x-2 p-2">
                                <a class="btn btn-blue" href="{{ route('admin.cities.edit', $city) }}">Editar</a>
                                <a class="btn btn-red" onclick="confirmDelete()">
                                    Delete
                                </a>

                                <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST"
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
            {{ $cities->links() }}
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
                <span class="font-medium">Lista Vacia!</span> No existen Ciudades Registradas.
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
</div>
