<x-app-layout>
    @include('layouts.script')
    
    <style>
        .link-spacing > * + * {
            margin-left: 1.5rem; 
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

                    @foreach($Anuncio as $anuncio)
                    <form action="{{ route('anuncios.destroy', $anuncio->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este anúncio?')">
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
                                    @csrf
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <i class="ri-delete-back-2-line"></i> Apagar
                                    </button>
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
