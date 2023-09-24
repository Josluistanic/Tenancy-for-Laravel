<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <x-container class="py-10">
        <div class="flex justify-end mb-10">
            <a href="{{ route('tenants.create') }}" class="btn btn-blue">
                Nuevo
            </a>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Identificador
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dominio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $tenant->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $tenant->domains->first()->domain }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-5">
                                    <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-green">Editar</a>
                                    <form action="{{ route('tenants.destroy', $tenant) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-red">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-container>
</x-app-layout>
