<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Listado de Órdenes',
    ],
]">
@livewire('admin.orders.order-table')
</x-admin-layout>
