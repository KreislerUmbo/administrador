<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ciudades',
        'route' => route('admin.cities.index'),
    ],
    [
        'name' => 'Modificar Ciudad',
    ],
]">
<div class="card p-2">
 <x-validation-errors class="mb-4" />
<form action="{{ route('admin.cities.update',$city) }}" method="POST">
    @csrf
    @method('PUT')
    <div
        class="grid max-w-screen-xl grid-cols-2 gap-4 p-2 mx-auto sm:grid-cols-2 ">
        <div class="mb-2">
            <x-label class=" mb-2 text-left font-semibold">
                Código Ciudad
            </x-label>
            <x-input class=" w-full" placeholder="Ingrese el codigo del pais" name="codigo"
                value="{{ old('codigo',$city->codigo) }}" />
        </div>
        <div class="mb-2">
            <x-label class=" mb-2 text-left font-semibold">
                Elegir el Pais
            </x-label>
            <x-select class=" w-full" name="country_id">
                <option value="" >Seleccione un Pais</option>

                @foreach ($countries as $country)         
                    <option value="{{ $country->id }}"
                        {{ $city->country_id == $country->id ? 'selected="selected"' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </x-select>
        </div>
    </div>
    <div  class="grid max-w-screen-xl  gap-2 p-2 mx-auto">
        <x-label class=" mb-2 text-left font-semibold">
            Nombre de la Ciudad
        </x-label>
        <x-input class=" w-full" placeholder="Ingrese el nombre del País" name="name"
            value="{{ old('name',$city->name) }}" />
    </div>

    <div class="py-3 p-2">
        <x-button class="px-5 py-3 flex justify-items-center">Actualizar</x-button>
    </div>

</form>
</div>

</x-admin-layout>