<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <x-container>

        <div class="card mt-12">
            <div class="card-body">

                <form action="{{ route('tenants.update', $tenant) }}" method="post">
                    @csrf
                    @method('put')
                    <x-input-label value="Identificador" for="id" class="mb-5" />
                    <x-text-input type="text" class="w-full" id="id" name="id"
                        placeholder="Digite el identificador del tenant" :value="old('id', $tenant->id)" />
                    <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    <div class="flex justify-end mt-5">
                        <x-primary-button>Guardar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>

</x-app-layout>
