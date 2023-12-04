<x-app-layout>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionando novo usuário') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-adicionar" action="{{ route('clientes.store') }}" method="post">

                        @csrf

                        <div class="col-12">
                            <b>Dados pessoais</b>
                        </div>

                        <div class="col-md-8">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="col-md-4">
                            <label for="ddd" class="form-label">CPF</label>
                            <input type="text"  class="form-control" id="ddd" name="cpf" placeholder="000.000.000-00"required>
                        </div>

                        <div class="col-12" style="padding-top: 2%">
                            <b>Dados de acesso</b>
                        </div>

                        <div class="col-md-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                          </div>
  
                          <div class="col-md-4">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                          </div>

                          <div class="form-group col-md-3">
                            <label for="inputEstado" class="form-label">Tipo de usuário</label>
                            <select id="is_admin" name="is_admin" class="form-control">
                              <option selected>Selecione...</option>
                              <option value="1">Administrador</option>
                              <option value="0">Usuário comum</option>
                            </select>
                          </div>

                        <div class="col-10"></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="{{ route('clientes.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                            <button class="btn btn-success me-md-2" type="submit">Cadastrar</button>

                        </div>

                      </form>

                      
                </div>
            </div>
        </div>
    </div>

</x-app-layout>