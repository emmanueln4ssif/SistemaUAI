<x-app-layout>
@include('layouts.script')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .centrar {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .espacamento {
            margin-right: 10px;
            margin-top: 80px;
        }

        .card {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .imagem {
            height: 100px;
            width: 100px;
            margin-top: 5px;
        }

    </style>

    
    <div class="centrar">
        @can('view', Auth::user()->is_admin == 1)
        <div class="card espacamento" style="width: 18rem;">
         <img src="{{@asset('img/user.png')}}" class="card-img-top imagem" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Usuários</h5>
                    <a href="/conta/usuario" class="btn btn-danger">Acessar</a>
                </div>
        </div>
        @endcan
        <div class="card espacamento" style="width: 18rem;">
         <img src="{{@asset('img/house.png')}}" class="card-img-top imagem" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Imóveis</h5>
                    <a href="/conta/imoveis" class="btn btn-danger">Acessar</a>
                </div>
        </div>
        <div class="card espacamento" style="width: 18rem;">
         <img src="{{@asset('img/announce.png')}}" class="card-img-top imagem" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Anúncios</h5>
                    <a href="/conta/anuncios" class="btn btn-danger">Acessar</a>
                </div>
        </div>
        <div class="card espacamento" style="width: 18rem;">
         <img src="{{@asset('img/reserve.png')}}" class="card-img-top imagem" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Reservas</h5>
                    <a href="/conta/reservas" class="btn btn-danger">Acessar</a>
                </div>
        </div>
    </div>
    
</x-app-layout>
