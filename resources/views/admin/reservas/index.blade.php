<x-app-layout>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />

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
                    <b style="margin-top: 5%">Reservas do(s) seu(s) imóvel(is)</b>

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Anúncio
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Solicitante
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status atual
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Detalhes
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservasEnviadasAMim as $reserva)
                                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST">
                                    @csrf
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <svg style="margin-right: 5%" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                                            </svg>
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{$reserva->id}}</div>
                                                <div class="font-normal text-gray-500"></div>
                                            </div>  
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>{{$reserva->anuncio->titulo}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                ver nome do usuario
                                           </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                 {{$reserva->status}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                <a href="{{ route('reservas.show', $reserva->id) }}" class="text-red-600 hover:underline">Acessar</a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $reservas->links('pagination::tailwind') }}
                        </div>

                        <!--endif-->

                    </div>
                </div>
            </div>
        </div>





                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <b style="margin-top: 5%">Reservas feitas por você</b>

                                <<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Anúncio
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Solicitante
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status atual
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Detalhes
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservasFeitasPorMim as $reserva)
                                            @csrf
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    <svg style="margin-right: 5%" class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                        <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                                                    </svg>
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">{{$reserva->id}}</div>
                                                        <div class="font-normal text-gray-500"></div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>{{$reserva->anuncio->titulo}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                                        ver nome do usuario
                                                   </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                                         {{$reserva->status}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="inline-flex rounded-md shadow-sm" role="group">
                                                        <a href="{{ route('reservas.show', $reserva->id) }}" class="text-red-600 hover:underline">Acessar</a>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
        
                                <div class="text-center">
                                    {{ $reservas->links('pagination::tailwind') }}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

</x-app-layout>