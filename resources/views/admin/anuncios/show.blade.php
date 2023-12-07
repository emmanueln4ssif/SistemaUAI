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
            {{ __('Visualizar anúncio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h3 class="text-center medium-text medium-font bottom-margin top-margin">Informações do anúncio</h3>
                    <div id="carouselExampleControls" class="carousel slide bottom-margin" data-bs-ride="carousel">
                        <div class="carousel-inner bottom-margin">
                            <div class="carousel-item active">
                                <img src="{{ asset('img/header.png') }}" class="d-block w-100 carousel-img" alt="Nova Imagem do Imóvel">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('img/logo.png') }}" class="d-block w-100 carousel-img" alt="Imagem do Imóvel">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <p class="text left-margin"><label class="label">Título: </label>{{ $anuncio->titulo }}</p>
                            <p class="text left-margin"><label class="label">Valor: </label>{{ $anuncio->valor }}</p>
                            <p class="text left-margin"><label class="label">Tipo: </label>{{ $anuncio->tipo }}</p>
                            
                        </div>
                        <div class="col-md-6">
                            <p class="text left-margin"><label class="label">Tempo de Aluguel: </label>{{ $anuncio->tempo_aluguel }}</p>
                            <p class="text left-margin"><label class="label">Observações: </label>{{ $anuncio->observacoes }}</p>
                        </div>
                        <div class="top-margin text-left">
                            <button class="px-4 py-2 color-button rounded-borders"><a style="color: white; text-decoration: none;" href="{{route('anuncios.index')}}">Voltar</a></button>
                        </div>
                    </div>
     
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</x-app-layout>
