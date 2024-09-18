<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Listado de Ciudades',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.cities.create') }}">
            Nueva Ciudad
        </a>
    </x-slot>

    @livewire('admin.cities.city-index')
</x-admin-layout>
