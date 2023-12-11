<x-app-layout>
    <div class="container mx-auto my-4 bg-white rounded p-8">
           
        <div class="card">

            {!! Form::open(['route' => ['publicar.fotosC', $anuncio->id], 'files' => true, 'method' => 'put']) !!}
            @csrf
                <h1 class="text-2xl font-bold mt-8 text-center mb-2">Imágenes de tu inmueble</h1>
                <p class="text-center text-black">Agrega varias</p>

                <div class="flex gap-4 items-center justify-center">
                    <div class="flex items-center justify-center">
                        {!! Form::file('fotos[]', ['class' => 'mt-4 mb-4 flex items-center justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'autocomplete' => 'off', 'multiple', 'id' => 'foto_url', 'onchange' => 'previewImages(this)']) !!}
    
                    </div>
                </div>

                <!-- Contenedor para previsualizar las imágenes -->
                <div id="imagePreview" class="flex mt-4 space-x-4 justify-center flex-wrap"></div>

                <div class="flex items-center mt-8 justify-center">
                    <button type="submit" class="btn btn-primary ['class'=>'mt-2 ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']">Guardar</button>
                </div>
            {!! Form::close() !!}
        

        </div>
    
</div> 

        <x-slot name="js">
            <script>
                 function previewImages(input) {
                    var previewContainer = document.getElementById('imagePreview');
                    previewContainer.innerHTML = ''; // Limpiar la previsualización antes de agregar nuevas imágenes

                    var files = input.files;

                    for (var i = 0; i < files.length; i++) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            var imgElement = document.createElement('img');
                            imgElement.src = e.target.result;
                            imgElement.classList.add('w-32', 'h-32', 'object-cover'); // Ajusta el tamaño según tus necesidades
                            previewContainer.appendChild(imgElement);
                        };

                        reader.readAsDataURL(files[i]);
                    }
                }
            </script>
        </x-slot>
        
     
        
    
   


</x-app-layout>        