<x-app-layout>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <b> Crie o seu perfil </b>

                    <div class="mt-2">
                        Conte-nos mais sobre você para que possamos te conhecer melhor e te ajudar a encontrar o que você procura.
                    </div>
                    <div class="mt-2">
                    </div>

                    <form class="row g-3" id="form-adicionar" action="{{ route('perfil.store') }}" method="post" enctype="multipart/form-data">

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

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 3%">

                        <a href="{{ route('perfil.create') }}" class="btn btn-dark float-right">
                            <i class="fas fa-undo-alt"></i> Voltar
                        </a>

                        <button class="btn btn-success me-md-2" type="submit">Salvar perfil</button>

                    </div>

                  </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>