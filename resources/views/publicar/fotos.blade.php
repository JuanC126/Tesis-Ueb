<x-app-layout>
    @if(session('message'))
<div id="alert-1" class="flex items-center p-4 mb-4 ml-4 mr-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">información</span>
    <div class="ms-3 text-sm font-medium">
       {{ session('message') }}
    </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
  </div>
@endif
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