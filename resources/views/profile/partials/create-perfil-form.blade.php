<section>
    @include('layouts.script')
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Meu Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Preencha ou atualize os dados de perfil.") }}
        </p>
    </header>
    <form method="post" action="{{ route('perfil.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <img class="rounded w-36 h-36" src="{{asset('img/perfil/'.$perfil->foto)}}" alt="Extra large avatar">

        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $perfil->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Ocupação')" />
            <x-text-input id="ocupacao" name="ocupacao" type="text" class="mt-1 block w-full" :value="old('ocupacao', $perfil->ocupacao)" required autocomplete="ocupacao" />
            <x-input-error class="mt-2" :messages="$errors->get('ocupacao')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Descrição Pessoal')" />
            <x-text-input id="email" name="descricao_pessoal" type="text" class="mt-1 block w-full" :value="old('descricao_pessoal', $perfil->descricao_pessoal)" required autocomplete="descricao_pessoal" />
            <x-input-error class="mt-2" :messages="$errors->get('descricao_pessoal')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Telefone')" />
            <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full" :value="old('telefone', $perfil->telefone)" required autocomplete="username" placeholder="(00)00000-0000"/>
            <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Endereço')" />
            <x-text-input id="endereco" name="endereco" type="text" class="mt-1 block w-full" :value="old('endereco', $perfil->endereco)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Cidade')" />
            <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" :value="old('cidade', $perfil->cidade)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Estado')" />
            <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $perfil->estado)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('CEP')" />
            <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('cep', $perfil->cep)" required autocomplete="username" placeholder="00000-000"/>
            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
        </div>

        <div class="col-md-12">
            <label for="formFile" class="form-label">Enviar nova foto de perfil</label>
            <input class="form-control" type="file" id="formFile" name = "foto">
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
