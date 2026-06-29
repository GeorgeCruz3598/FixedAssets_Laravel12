<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Verificación de Área Segura</h2>
    </div>

    <div class="mb-4 text-sm text-gray-600 leading-relaxed">
        {{ __('Esta es una zona segura de la aplicación. Por favor, confirma tu contraseña antes de continuar con los registros de activos sensibles.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:ring-indigo-500">
                {{ __('Confirmar Acceso') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>