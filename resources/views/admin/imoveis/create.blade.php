<x-app-layout>

    @include('layouts.script')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar imóvel') }}
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

        .medium-font {
            font-weight: 500;
        }

        .large-text {
            font-size: 1.5rem;
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
            width: 200px;
            height: 200px;
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
            width: 100px;
            height: 100px;
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

    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <h3 class="large-text medium-font bottom-margin black-text">Preencha as informações do seu imóvel</h3>
                    <form action="{{ route('imoveis.store') }}" method="post">
                        @csrf
                        <div class="photo-container" id="photoContainer"></div>
                            <div class="grid">
                                <div class="bottom-margin">
                                    <label for="cidade" class="block text-sm font-medium text-gray-600 medium-text" >Cidade</label>
                                    <input type="text" name="cidade" id="cidade" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="estado" class="block text-sm font-medium text-gray-600 medium-text">Estado</label>
                                    <input type="text" name="estado" id="estado" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="CEP" class="block text-sm font-medium text-gray-600 medium-text">CEP</label>
                                    <input type="text" name="CEP" id="CEP" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="bairro" class="block text-sm font-medium text-gray-600 medium-text">Bairro</label>
                                    <input type="text" name="bairro" id="bairro" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="endereco" class="block text-sm font-medium text-gray-600 medium-text">Endereço</label>
                                    <input type="text" name="endereco" id="endereco" class="form-input"required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="tipo" class="block text-sm font-medium text-gray-600 medium-text">Tipo</label>
                                    <input type="text" name="tipo" id="tipo" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="tamanho" class="block text-sm font-medium text-gray-600 medium-text">Tamanho</label>
                                    <input type="text" name="tamanho" id="tamanho" class="form-input" required>
                                </div>
                                <div class="bottom-margin">
                                    <label for="quant_quartos" class="block text-sm font-medium text-gray-600 medium-text">Quantidade de Quartos</label>
                                    <input type="text" name="quant_quartos" id="quant_quartos" class="form-input" required>
                                </div>

                            </div>
                            <div class="top-margin text-center">
                                <button class="px-4 py-2 color-button white-text rounded-borders"><a style="color: white; text-decoration: none;" href="{{route('imoveis.index')}}">Voltar</a></button>
                                <button type="submit" class="px-4 py-2 color-button white-text rounded-borders">Criar</button>
                            </div>
                        </form>
                  
                </div>
            </div>
        </div>
    </div>

    <script>
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

                    img.classList.add(i === 0 ? 'large' : 'small');

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