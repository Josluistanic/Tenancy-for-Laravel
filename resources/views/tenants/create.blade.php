<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Tenant') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="card">
            <div class="card-body">

                <form action="{{ route('tenants.store') }}" method="post">
                    @csrf
                    <x-input-label value="Identificador" for="id" class="mb-5" />
                    <x-text-input type="text" class="w-full" id="id" name="id"
                        placeholder="Digite el identificador del tenant" :value="old('id')" />
                    <x-input-error :messages="$errors->get('id')" class="mt-2" />
                    <div class="flex justify-end mt-5">
                        <x-primary-button>Guardar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>

</x-app-layout>
