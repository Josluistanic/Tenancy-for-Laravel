<x-tenant-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Task') }}
        </h2>
    </x-slot>

    <x-container class="py-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <x-input-label value="Nombre" for="name" class="mb-2" />
                        <x-text-input type="text" :value="old('name')" name="name" id="name"
                            placeholder="Ingrese un nombre" class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label value="Descripción" for="description" class="mb-2" />
                        <textarea name="description" id="description" cols="30" rows="5" class="input w-full"
                            placeholder="Ingrese una descripción">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label value="Imagen" for="image_url" class="mb-2" />
                        <input type="file" class="input" id="image_ur" name="image_url">
                        <x-input-error :messages="$errors->get('image_ur')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Crear</x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </x-container>
</x-tenant-layout>
