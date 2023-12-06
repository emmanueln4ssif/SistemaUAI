<x-app-layout>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
         {{session('success')}}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Dados da reserva solicitada') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Verifique os dados e entre em contato com o solicitante antes de alterar o status da reserva. Tenha ciência antes de confirmar uma reserva") }}
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        <b>{{ __("Referente ao anúncio: ").'#'.$reserva->anuncio->id.' "'.$reserva->anuncio->titulo.'", disponível em: '}} <a href="/conta/anuncios/{{$reserva->anuncio->id}}">Visualizar anúncio</a></b>
                    </p>

                    <div style="margin: 3%"></div>

                    <div>
                        <x-input-label for="email" :value="__('Nome do Solicitante')" />
                        <x-text-input id="telefone" name="solicitante_id" type="text" class="mt-1 block w-full" :value="old('solicitante_id', $user->name)" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('solicitante_id')" />
                    </div>

                    <div style="margin-top: 1%">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="telefone" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user->email)" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    @if($perfil)
                    <div style="margin-top: 1%">
                        <x-input-label for="email" :value="__('Telefone')" />
                        <x-text-input id="ocupacao" name="telefone" type="text" class="mt-1 block w-full" :value="old('telefone', $perfil->telefone)" readonly />
                        <x-input-error class="mt-2" :messages="$errors->get('telefone')" />
                    </div>
                    @endif
        
                    <div style="margin-top: 1%">
                        <x-input-label for="email" :value="__('Observações')" />
                        <x-text-input id="email" name="observacoes" type="text" class="mt-1 block w-full" :value="old('observacoes', $reserva->observacoes)" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('observacoes')" />
                    </div>
        
                    <div style="margin-top: 1%">
                        <x-input-label for="email" :value="__('Quantidade de quartos')" />
                        <x-text-input id="telefone" name="quantidade_quartos" type="text" class="mt-1 block w-full" :value="old('telefone', $reserva->quantidade_quartos)" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('quantidade_quartos')" />
                    </div>

                    <div style="margin-top: 1%">
                        <x-input-label for="email" :value="__('Data desejada')" />
                        <x-text-input id="telefone" name="data_entrada" type="text" class="mt-1 block w-full" :value="old('data_entrada', $dia_inicio)" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('data_entrada')" />
                    </div>

                
                <form style="margin-top: 1%" action = "{{ route('reservas.confirmarReserva', $reserva->id) }}" method="post">
                    @csrf
                    <x-input-label for="email" :value="__('Alterar status da reserva')" />

                    <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Selecione</selected>
                        <option value="pendente">Pendente</option>
                        <option value="confirmada">Confirmada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>

                    <button type="submit" style = "margin-top: 1%" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </button>

                    

                </form>
            </div>
        </div>
        </div>
    </div>
    

</x-app-layout>
