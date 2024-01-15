<x-app-layout>
<div class="bg-fondo  overflow-x-hidden">
<h1 class="text-center text-lg text-white">Edita tu informacion</h1>

<a href="/perfil">

<button  id="dropdownLeftButton" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" class="mb-3 ml-8 md:mb-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"><svg class="w-2.5 h-2.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
  </svg>Volver</button>
</a>
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
            
            <div class="card ">
           
                        
                        {!! Form::model($anuncio, ['route' => ['publicar.update', $anuncio->slug], 'method' => 'PUT', 'files' => true]) !!}
                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('titulo', 'Titulo del anuncio') !!}</label>
                                {!! Form::text('titulo', null, ['class' => ' bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            
                            <div class="m-8">
                                {!! Form::hidden('slug', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('descripcion', 'Descripcion del anuncio') !!}</label>
                                {!! Form::textarea('descripcion', null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>

                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('celular', 'Celular') !!}</label>
                                {!! Form::text('celular', null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <!-- Sección de selección de sector -->
                            <div class=" m-8">
                             {!! Form::label('sector', 'Selecciona el Sector', ['class' => 'flex mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
                             {!! Form::select('sector', $sectores, $anuncio->sector, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 ml-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'autocomplete' => 'off']) !!}
                             
                            </div>
                             <div>           
                               {!! Form::label('inmueble', 'Selecciona el inmueble', ['class' => ' ml-8 mt-4 flex mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
                               {!! Form::select('inmueble', $tipo_inmuebles, $anuncio->tipo_inmueble, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 ml-12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('pago_mensual', 'Pago mensual') !!}</label>
                                {!! Form::text('pago_mensual', null,['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block ml-8 text-lg mb-2 font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('latitud', 'ubicacion') !!}</label>
                                {!! Form::hidden('latitud', $anuncio->latitud, ['id' => 'latitud', 'class' => 'form-input block w-full mt-1']) !!}
                                {!! Form::hidden('longitud', $anuncio->longitud, ['id' => 'longitud', 'class' => 'form-input block w-full mt-1']) !!}
                                <div id="mapid" class="ml-8 w-full lg:w-2/3 xl:w-3/4" style="height: 350px;"></div>

                            <script>
                                var latitud = parseFloat(document.getElementById('latitud').value) || -12.0464;
                                var longitud = parseFloat(document.getElementById('longitud').value) || -77.0428;

                                var map = L.map('mapid').setView([-1.571269,  -79.006827], 13);

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                }).addTo(map);

                                var marker = L.marker([latitud, longitud]).addTo(map);

                                function onMapClick(e) {
                                    document.getElementById('latitud').value = e.latlng.lat;
                                    document.getElementById('longitud').value = e.latlng.lng;
                                    marker.setLatLng(e.latlng);
                                }

                                map.on('click', onMapClick);
                            </script>
                            </div>

                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('nombre_calle', 'Nombre de la calle') !!}</label>
                                {!! Form::text('nombre_calle', null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('referencia', 'Referencia') !!}</label>
                                {!! Form::text('referencia', null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            
                            <div class="m-8">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('garantia_valor', ' Valor de la garantia') !!}</label>
                                {!! Form::text('garantia_valor', null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off']) !!}
                            </div>
                            <div class="m-8">
                                <h1 class="text2x1 font-medium mt-8 mb-2">Imagen principal </h1>
                                <h1 class=" font-xs text-gray-500 mb-2">Trata de escoger una imagen, donde se vea el exterior del inmueble </h1>
                                <div class="flex gap-4">
                                    <figure class="flex">
                                        <img  class="object-cover block w-full ml-4 h-64 bg-cover bg-center" src="{{ Storage::url('recursos/edificioE.webp')}}" alt="imagen de referencia">
                                        <img id="picture" class="w-600 w-1/2 ml-4 flex h-64 bg-cover bg-center" src="{{ Storage::url($anuncio->foto_url) }}" alt="">
                                    </figure>
                                    <div>
                                        <p>Cambia la foto principal de tu anuncio</p>
                                        {!! Form::file('foto_url', ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off','id'=>'file']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="m-8">
                                <h3 class="mb-4 mt-4 ml-8 font-semibold text-gray-900 dark:text-white">Servicios basicos</h3>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($servicios_basicos as  $nombre)
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">  
                                            @php
                                                $isChecked = strpos($anuncio->servicio_basico, $nombre) !== false;
                                            @endphp
                                            {!! Form::checkbox('servicio_basico[]', $nombre, $isChecked, [
                                                'id' => 'servicio-' . $nombre . '-checkbox-list',
                                                'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500'
                                            ]) !!}

                                            {{-- Genera la etiqueta del checkbox con el nombre del servicio básico --}}
                                            {!! Form::label('servicio-' . $nombre . '-checkbox-list', $nombre, [
                                                'class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300'
                                            ]) !!}
                                        </div>
                                    </li>
                                @endforeach
                            
                                </ul>
                            </div>
                            <div class="m-8">
                                <h3 class="mb-4 mt-4 ml-8 font-semibold text-gray-900 dark:text-white">Servicios adicionales</h3>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($servicios_adicionales as $servicio)
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            @php
                                                $isChecked = strpos($anuncio->servicio_adicional, $servicio) !==false;
                                            @endphp
                                            {!! Form::checkbox('servicio_adicional[]', $servicio, $isChecked, ['id' => $servicio . '-checkbox-list', 'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                                            {!! Form::label($servicio . '-checkbox-list', $servicio, ['class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div >
                            <div class="flex ">
                                {!! Form::submit('Actualizar información', ['class'=>'mt-2 ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}
                            </div>

                        {!! Form::close() !!}
            </div>
            
        </div>






        {{-- formulario de fotos --}}
        <div class="container mx-auto my-4 bg-white rounded p-8">
           
                <div class="card">
       
                    {!! Form::model($anuncio, ['route' => ['publicar.update2', $anuncio->slug], 'method' => 'PUT', 'files' => true, 'id' => 'imageForm']) !!}
                        @csrf
                        <h1 class="text-2xl font-bold mt-8 text-center mb-2">Imágenes de tu inmueble</h1>
                        <p class="text-center text-black">Agrega varias</p>

                        <div class="flex gap-4 items-center justify-center">
                            <div class="flex items-center justify-center">
                                {!! Form::file('fotos[]', ['class' => 'mt-4 mb-4 flex items-center justify-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500', 'autocomplete' => 'off', 'multiple', 'id' => 'file2', 'onchange' => 'previewImages(this)']) !!}
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
                document.getElementById("titulo").addEventListener("keyup", slugChange);
                function slugChange(){
                    titulo=document.getElementById("titulo").value;
                    document.getElementById("slug").value=slug(titulo);
                }
                function slug(str){
                    var $slug = '';
                    var trimmed = str.trim(str);
                    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                    replace(/-+/g, '-').
                    replace(/^-|-$/g, '');
                    return $slug.toLowerCase();
                }

                  //Cambiar imagen
                    document.getElementById("file").addEventListener('change', cambiarImagen);

                    function cambiarImagen(event){
                        var file = event.target.files[0];

                        var reader = new FileReader();
                        reader.onload = (event) => {
                            document.getElementById("picture").setAttribute('src', event.target.result); 
                        };

                        reader.readAsDataURL(file);
                    }

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
</body>        

</div>
</x-app-layout>