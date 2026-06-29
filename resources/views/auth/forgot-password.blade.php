<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Recuperación de Contraseña</h2>
    </div>

    <div class="mb-4 text-sm text-gray-600 leading-relaxed">
        {{ __('¿Olvidaste tu contraseña? No hay problema. Ingresa tu dirección de correo corporativo y te enviaremos un enlace para restablecer tu contraseña y recuperar el acceso al sistema de activos.') }}
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Correo Corporativo')" />
            <x-text-input id="email" class="block mt-1 w-full focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800 focus:ring-indigo-500 w-full justify-center">
                {{ __('Enlace para reestablecer la contraseña del correo') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>