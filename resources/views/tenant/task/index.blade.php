<x-tenant-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="flex justify-end mb-10">
            <a href="{{ route('tasks.create') }}" class="btn btn-blue">Nuevo</a>
        </div>

        @if ($tasks->count())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $task->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $task->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-6">
                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-blue">Ver</a>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-green">Editar</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="post">
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

            <div class="flex justify-end my-4">
                {{ $tasks->links() }}
            </div>
        @else
            <div class="card">
                <div class="card-body text-white">
                    Aún no existen tareas
                </div>
            </div>
        @endif

    </x-container>
</x-tenant-layout>
