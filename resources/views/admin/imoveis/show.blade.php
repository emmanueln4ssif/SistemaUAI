<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .left-margin {
            margin-left: 8rem;
        }

        .top-margin {
            margin-top: 1rem;
        }

        .bottom-margin {
            margin-bottom: 1.5rem;
        }

        .label {
            color: #ed3849;
            font-weight: bold;
            font-size: 1.15em;
            margin-right: 6px;
            font-family: "Poppins", sans-serif;
        }

        .text {
            font-size: 1.05em;
            color: #0f172a;
            font-weight: 500;
            font-family: "Poppins", sans-serif;
        }

        #carouselExampleControls {
            max-width: 800px; 
            margin: 0 auto; 
        }

        .carousel-img {
            width: 100%; 
            margin: 0 auto;
        }

        .color-button {
            background-color: #ed3849;
        }

        .white-text {
            color: #fff;
        }

        .rounded-borders {
            border-radius: 0.375rem;
        }
    </style>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar imóvel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h3 class="text-center medium-text medium-font bottom-margin top-margin">Informações do Imóvel</h3>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <p class="text left-margin"><label class="label">Cidade: </label>{{ $imovel->cidade }}</p>
                            <p class="text left-margin"><label class="label">Estado: </label>{{ $imovel->estado }}</p>
                            <p class="text left-margin"><label class="label">CEP: </label>{{ $imovel->cep }}</p>
                            <p class="text left-margin"><label class="label">Bairro: </label>{{ $imovel->bairro }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text ml-2"><label class="label">Endereço: </label>{{ $imovel->endereco }}</p>
                            <p class="text ml-2"><label class="label">Tipo: </label>{{ $imovel->tipo }}</p>
                            <p class="text ml-2"><label class="label">Tamanho: </label>{{ $imovel->tamanho }}m²</p>
                            <p class="text ml-2"><label class="label">Quantidade de Quartos: </label>{{ $imovel->quantidade_quartos }} quartos</p>
                        </div>
                    </div>
                    <div class="top-margin text-left">
                                <button class="px-4 py-2 color-button rounded-borders"><a style="color: white; text-decoration: none;" href="{{route('imoveis.index')}}">Voltar</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</x-app-layout>
