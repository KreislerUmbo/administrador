<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Portadas',
        'route' => route('admin.covers.index'),
    ],
    [
        'name' => 'Nueva Portada',
    ],
]">

    <form action="{{ route('admin.covers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <figure class="  mb-4 relative">
            <div class=" absolute top-8 right-8">
                <label class=" flex items-center px-4 py-2 rounded-lg">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar Imagen
                    <input type="file" class="hidden" accept="image/*" name="image"
                        onchange="previewImage(event,'#imgPreview')">
                </label>
            </div>
            <img src="{{ asset('img/no-image-horizontal.png') }}" alt="Portada"
                class="w-full aspect-[3/1] object-cover object-center" id="imgPreview">
        </figure>
        <x-validation-errors class="mb-4"/>
        <div class="mb-4">
            <x-label>
                Titulo
            </x-label>
            <x-input name="title" value="{{ old('title') }}" class=" w-full" placeholder="Ingrese un Titulo" />
        </div>
        <div class="mb-4">
            <x-label>
                Fecha de Inicio
            </x-label>
            <x-input type="date" name="start_at" value="{{ old('start_at', now()->format('Y-m-d')) }}"
                class=" w-full" />
        </div>
        <div class="mb-4">
            <x-label>
                Fecha Fin
            </x-label>
            <x-input type="date" name="end_at" value="{{ old('end_at') }}" class=" w-full" />
        </div>
        <div class="mb-4 flex space-x-2">
            <label> La imagen estara activo o inactivo?</label>
            <x-label>
                <x-input type="radio" name="is_active" value="1" checked />
                Activo
            </x-label>
            <x-label>
                <x-input type="radio" name="is_active" value="0" />
                Inactivo
            </x-label>

        </div>
        <div class=" flex justify-end">
            <x-button>
                Crear Portada
            </x-button>
        </div>

    </form>

    @push('js')
        <script>
            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                const input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                $imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                file = input.files[0];

                //Creamos la url
                objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                $imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-admin-layout>
