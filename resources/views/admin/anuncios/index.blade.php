<x-app-layout>
    @include('layouts.script')
    
    <style>
        .link-spacing > * + * {
            margin-left: 1.5rem; 
        }

        .top-margin {
            margin-top: 0.5rem;
        }

        .bottom-margin{
            margin-bottom: 1.5rem;
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

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus anúncios') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="top-margin bottom-margin text-right">
                        <button class="px-4 py-2 color-button rounded-borders"><a style="color: white; text-decoration: none;" href="{{route('anuncios.create')}}">Criar novo anúncio</a></button>
                    </div>
                    @foreach($Anuncio as $anuncio)
                        <div class="mb-4 border p-4">
                            <h3 class="text-lg font-semibold">{{ $anuncio->titulo }}</h3>
                            <p>{{ $anuncio->valor }}</p>
                            <p>{{ $anuncio->tipo }}</p>
                            <p>{{ $anuncio->observacoes}}</p>
                            <div class="flex items-center space-x-4 mt-2 link-spacing">
                                <a href="{{ route('anuncios.show', $anuncio->id) }}" class="text-red-600 hover:underline">Detalhes</a>
                                <a href="{{ route('anuncios.edit', $anuncio->id) }}" class="text-red-600 hover:underline">
                                    <i class="ri-pencil-line"></i> Editar
                                </a>
                                <form action="{{ route('anuncios.destroy', $anuncio->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este anúncio?')">
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <i class="ri-delete-back-2-line"></i> Apagar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="top-margin text-left">
                        <button class="px-4 py-2 color-button rounded-borders"><a style="color: white; text-decoration: none;" href="{{route('dashboard')}}">Voltar</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
