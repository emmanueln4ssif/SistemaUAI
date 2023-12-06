<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Deletar conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez deletada, todos os recursos atrelados a sua conta serão perdidos em conjunto.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem certeza de que deseja prosseguir?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Uma vez deletada, todos os recursos atrelados a sua conta serão perdidos em conjunto. Por favor, digite sua senha para confirmar a requisição.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Deletar conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
