<x-app-layout>
    @include('layouts.script')
    
    <style>
        .link-spacing > * + * {
            margin-left: 1.5rem; 
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus imóveis') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    @foreach($imoveis as $imovel)
                        <div class="mb-4 border p-4">
                            <h3 class="text-lg font-semibold">{{ $imovel->tipo }}</h3>
                            <p>{{ $imovel->endereco }}, {{ $imovel->bairro }}, {{ $imovel->cidade }}, {{ $imovel->estado }}</p>
                            <p>Quantidade de Quartos: {{ $imovel->quantidade_quartos }}</p>
                            <div class="flex items-center space-x-4 mt-2 link-spacing">
                                <a href="{{ route('imoveis.show', $imovel->id) }}" class="text-red-600 hover:underline">Detalhes</a>
                                <a href="{{ route('imoveis.edit', $imovel->id) }}" class="text-red-600 hover:underline">
                                    <i class="ri-pencil-line"></i> Editar
                                </a>
                                <form action="{{ route('imoveis.destroy', $imovel->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este imóvel?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <i class="ri-delete-back-2-line"></i> Apagar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
