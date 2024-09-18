<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Listado de Destinos',
    ],
]">
    <x-slot name="action">
        <a class=" btn btn-green" href="{{ route('admin.destinos.create') }}">
            Nuevo Destino
        </a>
    </x-slot>

    @livewire('admin.destinos.destino-index')
</x-admin-layout>