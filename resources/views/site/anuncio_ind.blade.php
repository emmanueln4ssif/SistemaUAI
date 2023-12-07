<!DOCTYPE html>
@include('layouts.script')

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{@asset('css/inicio.css')}}" />
    <title>UAI Home</title>
  </head>

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

    .rounded-borders {
        border-radius: 0.375rem;
    }

</style>

  <body>
    <nav>
      <ul class="nav__links">
        <li class="link"><a href="/">Início</a></li>
        <li class="link"><a href="{{ route('register') }}">Registrar-se</a></li>
      </ul>
      <div class="nav__logo">
        <a href="#">UAI Home<span>.</span></a>
      </div>
      <div class="nav__icons">
        <span>
          
        </span>
        <span>
          <a href="{{ route('login') }}">Login  <i class="ri-user-line"></i></a>
        </span>
      </div>
    </nav>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar anúncio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h5 class="text-center medium-text medium-font bottom-margin top-margin">Informações do anúncio</h5><br>
                <h3 class="text-center medium-text medium-font bottom-margin top-margin">{{$anuncio->titulo}}</h3><br>
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
                    <div class="row justify-content-center" style="margin-left:5%">
                        <div class="col-md-6" style="margin-top: 5%">
                            <p class="text left-margin"><label class="label">Descrição: </label>{!! nl2br(e($anuncio->observacoes)) !!}</p>
                            <p class="text left-margin"><label class="label">Tipo: </label>{{ $anuncio->tipo }}</p>
                            <p class="text left-margin"><label class="label">Tamanho do imóvel: </label>{{ $imovel->tamanho }}m²</p>
                            <p class="text left-margin"><label class="label">Localização: </label>{{ $imovel->bairro. ", ". $imovel->cidade . " - " . $imovel->estado }}</p>
                        </div>
                        <div class="col-md-6" style="margin-top: 5%">
                            <p class="text left-margin"><label class="label">Tempo de Aluguel: </label>{{ $anuncio->tempo_aluguel }}</p>
                            <p class="text left-margin"><label class="label">Valor: </label>{{ $anuncio->valor }} reais</p>
                            <p class="text left-margin"><label class="label">Valor m²: </label>{{ $valor_m2}} reais/m²</p>

                        </div>

                        <form action="{{ route('reservas.solicitarReserva', $anuncio->id) }}" method="post">
                            @csrf
                            <div class="top-margin text-center" style = "margin: 5%">
                                <button class="px-4 py-2 color-button white-text rounded-borders"><a style="color: white; text-decoration: none;" href="/">Voltar</a></button>
                                <button type="submit" style = "color:white" class="px-4 py-2 color-button white-text rounded-borders">Solicitar Reserva</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
  </body>
 
</html>