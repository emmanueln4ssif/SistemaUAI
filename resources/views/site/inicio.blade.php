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
  <body>
    <nav>
      <ul class="nav__links">
        <li class="link"><a href="#">Início</a></li>
        <li class="link"><a href="{{ route('register') }}">Registrar-se</a></li>
      </ul>
      <div class="nav__logo">
        <a href="#">UAI Home<span>.</span></a>
      </div>
      <div class="nav__icons">
        <span>
          <a href="#"><i class="ri-search-line"></i></a>
        </span>
        <span>
          <a href="{{ route('login') }}">Login  <i class="ri-user-line"></i></a>
        </span>
      </div>
    </nav>

    <header class="section__container header__container">
      <div class="header__content">
        <h4>SEGURANÇA É FUNDAMENTAL</h4>
        <h1>Seu imóvel, nossa garantia.</h1>
        <p>
          Segurança é fundamental para qualquer negócio. Por isso, a UAI Home garante a segurança do seu imóvel a partir de uma plataforma segura para que você possa anunciar ou alugar um imóvel.
        </p>
        <a href="{{ route('login') }}"><button class="btn">ANUNCIE</button></a>
      </div>
      <div class="header__image">
        <img src="{{@asset('img/couple.png')}}" alt="header" />
      </div>
    </header>

    <section class="section__container categories__container">
      
    </section>

    <h2 class="section__header">Categorias</h2>
      <p class="section__subheader">
        Abrangimos aluguéis por temporada e também para aqueles que desejam morar em um imóvel por um longo período. 
      </p>

    <section class="section__container hero__container">
      <div class="hero__card">
        <img src="{{@asset('img/header.png')}}" alt="hero" />
        <div class="hero__content">
          <p>TEMPORADA</p>
          <h4>Aluguéis de curto prazo</h4>
          
        </div>
      </div>
      <div class="hero__card">
        <img src="{{@asset('img/header.png')}}" alt="hero" />
        <div class="hero__content">
          <p>MORADIA</p>
          <h4>Aluguéis para o tempo necessário</h4>
          
        </div>
      </div>
    </section>

    <section class="section__container product__container">
    <h2 class="section__header">Anúncios em alta</h2>

    @if($anuncios->isEmpty())
        <p class="text-center">Ainda não há anúncios disponíveis no momento</p>
    @else
        <div class="row">
            @foreach($anuncios as $anuncio)
                <div class="col-md-4 position-relative" style="height: 500px; border: 1px solid #ddd; margin-bottom:10px">
                    
                        <div style="height: 300px;"><img src="{{@asset('img/casa1.webp')}}" alt="hero" class="img-fluid" /></div>
                        <div style="margin-left: 10px; height: 250px;">
                            <h4 class="text-lg font-semibold text-center">{{ $anuncio->titulo }}</h4>
                            <p style="color: black;" class="text-left">Valor(R$): {{ $anuncio->valor }}</p>
                            <p style="color: black;" class="text-left">Tipo: {{ $anuncio->tipo }}</p>
                            <p style="color: black; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="text-left">Observações: {{ $anuncio->observacoes}}</p>
                            <a class="text-center; hover:underline" style="margin-left: 160px; color: red; text-decoration: none;" href="{{ route('anuncio.index', $anuncio->id) }}">Ver detalhes</a>
                        </div>
                   
                </div>
            @endforeach
        </div>
    @endif
</section>





    <footer class="section__container footer__container">
      <div class="footer__col">
        <h4>CONTATO</h4>
        <p>
          <span><i class="ri-map-pin-2-fill"></i></span>
          Rua José Lourenço Kelmer, Campus Universitário da UFJF, São Pedro, Juiz de Fora - MG</p>
        <p>
          <span><i class="ri-mail-fill"></i></span>
          suporte@uai.br
        </p>
        <p>
          <span><i class="ri-phone-fill"></i></span>
          (32) 1234-5678
        </p>
      </div>
      <div class="footer__col">
      </div>
      <div class="footer__col">
        <h4>SOBRE NÓS</h4>
        <a href="#">Home</a>
        <a href="#">Anúncios</a>
        <a href="{{route('dashboard')}}">Área do Usuário</a>
        <a href="#">Dúvidas frequentes</a>
      </div>
      <div class="footer__col">
        <h4>REDES SOCIAIS</h4>
        <a href="#">Facebook</a>
        <a href="#">Instagram</a>
        <a href="#">Twitter</a>
        <a href="#">LinkedIn</a>
      </div>
    </footer>
    <div class="footer__bar">
      Copyright © 2023 Equipe UAI de Desenvolvimento. Todos os direitos reservados.
    </div>
  </body>
</html>
