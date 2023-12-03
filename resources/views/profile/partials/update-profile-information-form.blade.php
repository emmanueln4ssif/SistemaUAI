<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Preencha ou atualize os dados do seu perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <form id="send-verification" method="post" action="{{ route('perfil.create') }}">
            @csrf

            <div class="mt-2">
                <x-input-label for="username" :value="__('Nome de Usuário')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" autocomplete="username" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="ocupacao" :value="__('Ocupação')" />
                <x-text-input id="username" name="ocupacao" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="descricao" :value="__('Descrição Pessoal')" />
                <x-text-input id="username" name="descricao" type="text" class="mt-2 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input id="username" name="telefone" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="telefone" :value="__('Endereço')" />
                <x-text-input id="username" name="endereco" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="telefone" :value="__('Cidade')" />
                <x-text-input id="username" name="cidade" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="telefone" :value="__('Estado')" />
                <x-text-input id="username" name="estado" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="telefone" :value="__('CEP')" />
                <x-text-input id="username" name="cep" type="text" class="mt-1 block w-full" autocomplete="ocupacao" />
                <x-input-error :messages="$errors->updatePassword->get('username')" class="mt-2" />
            </div>

            <div class="mt-2">
                EXIBIR AVALIAÇÕES
            </div>

            <div class="mt-2">
                COLOCAR BOTAO DE FOTO
            </div>


    
        </form>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
