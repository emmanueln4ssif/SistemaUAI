<x-app-layout>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar anúncio') }}
        </h2>
    </x-slot>

    <style>
        .no-overflow {
            overflow: hidden;
        }

        .shadow {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .black-text {
            color: #0f172a;
        }

        .padding {
            padding: 24px;
        }

        .medium-text {
            font-size: 1.125rem;
        }

        .large-text {
            font-size: 1.5rem;
        }

        .medium-font {
            font-weight: 500;
        }

        .bottom-margin {
            margin-bottom: 1.5rem;
        }

        .form-input {
            width: 100%;
            font-size: 16px;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #d2d6dc;
            border-radius: 0.25rem;
            box-sizing: border-box;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .top-margin {
            margin-top: 1rem;
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

        .photo-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .add-photo {
            width: 150px;
            height: 150px;
            border: 2px dashed #0066cc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #0066cc;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-right: 16px;
            margin-bottom: 20px;
            position: relative;
        }

        .added-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 16px;
            margin-bottom: 20px;
            position: relative;
        }

        .file-input {
            display: none; 
        }

        .remove-photo {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #fff;
            color: #0066cc;
            border: none;
            padding: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .image-wrapper {
            position: relative;
        }

        .update-photo {
            width: 150px;
            height: 150px;
            border: 2px dashed #0066cc;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #0066cc;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin-right: 16px;
            margin-bottom: 20px;
            position: relative;
        }

        .remove-photo {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #fff;
            color: #0066cc;
            border: none;
            padding: 4px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <h3 class="large-text medium-font bottom-margin black-text">Atualize as informações do seu anúncio</h3>
                    <form action="{{ route('anuncios.update', $anuncio->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="top-margin text-center">
                            <button type="button" class="px-4 py-2 color-button white-text rounded-borders bottom-margin" onclick="document.getElementById('fotos').click()">Adicionar Fotos</button>
                        </div>
                        <input style="display: none;" type="file" name="fotos" id="fotos" accept="image/*" multiple onchange="previewImages(event)" required>
                        <div class="photo-container" id="photoContainer">
                            @if ($anuncio->fotos && $anuncio->fotos->count() > 0)
                                @foreach($anuncio->fotos as $foto)
                                    <div class="image-wrapper">
                                        <img src="{{ asset('storage/' . $foto->caminho) }}" alt="Imagem Existente" class="added-photo large">
                                        <button type="button" class="remove-photo" onclick="removeExistingImage({{ $foto->id }})">Remover</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="grid">
                            <div class="bottom-margin">
                                <label for="titulo" class="block text-sm font-medium text-gray-600 medium-text">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-input" value="{{ $anuncio->titulo }}" required>
                            </div>
                            <div class="bottom-margin">
                                <label for="tipo" class="block text-sm font-medium text-gray-600 medium-text">Tipo</label>
                                <input type="text" name="tipo" id="tipo" class="form-input" value="{{ $anuncio->tipo }}" required>
                            </div>
                            <div class="bottom-margin">
                                <label for="valor" class="block text-sm font-medium text-gray-600 medium-text">valor</label>
                                <input type="text" name="valor" id="valor" class="form-input" value="{{ $anuncio->valor }}" required>
                            </div>
                            <div class="bottom-margin">
                                <label for="tempo_aluguel" class="block text-sm font-medium text-gray-600 medium-text">Tempo de Aluguel</label>
                                <input type="text" name="tempo_aluguel" id="tempo_aluguel" class="form-input" value="{{ $anuncio->tempo_aluguel }}" required>
                            </div>
                            <div class="bottom-margin">
                                <label for="observacoes" class="block text-sm font-medium text-gray-600 medium-text">Observações</label>
                                <input type="text" name="observacoes" id="observacoes" class="form-input" value="{{ $anuncio->observacoes }}" required>
                            </div>
                        </div>

                        <div class="top-margin">
                            <button type="submit" class="px-4 py-2 color-button white-text rounded-borders">Atualizar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function removeExistingImage(photoId) {
            alert('Remover imagem com o ID: ' + photoId);
        }
        
        function previewImages(event) {
            const container = document.getElementById('photoContainer');

            for (let i = 0; i < event.target.files.length; i++) {
                const file = event.target.files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Added Photo';
                    img.classList.add('added-photo');

                    const imageWrapper = document.createElement('div');
                    imageWrapper.classList.add('image-wrapper');

                    const removeButton = document.createElement('button');
                    removeButton.textContent = 'Remove';
                    removeButton.classList.add('remove-photo');
                    removeButton.addEventListener('click', function () {
                        container.removeChild(imageWrapper);
                    });

                    imageWrapper.appendChild(img);
                    imageWrapper.appendChild(removeButton);

                    container.appendChild(imageWrapper);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

</x-app-layout>
