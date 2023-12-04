<x-app-layout>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-editar" action="{{ route('clientes.update', $user->id) }}" method="POST">

                        @csrf

                        <div class="col-12">
                            <b>Dados pessoais</b>
                        </div>

                        <div class="col-md-8">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" required>
                        </div>

                        <div class="col-md-4">
                            <label for="ddd" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="ddd" value="{{$user->cpf}}" name="cpf" required>
                        </div>

                        <div class="col-12" style="padding-top: 2%">
                            <b>Dados de acesso</b>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                        </div>
  
                        <div class="col-10"></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="{{ route('clientes.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                            <button class="btn btn-success me-md-2" type="submit">Atualizar dados</button>

                        </div>

                      </form> 
                </div>
            </div>
        </div>
    </div>

</x-app-layout>