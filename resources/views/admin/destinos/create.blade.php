<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ciudades',
        'route' => route('admin.destinos.index'),
    ],
    [
        'name' => 'Registrar Nuevo Destino',
    ],
]">

    @livewire('admin.destinos.destino-create')
</x-admin-layout>
