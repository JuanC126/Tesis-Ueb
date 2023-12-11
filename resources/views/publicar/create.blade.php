<x-app-layout>
    <div class="bg-fondo">
        <h1 class="text-center text-lg text-white">Crea tu nuevo anuncio</h1>
        
        <a href="/perfil">
        
        <button  id="dropdownLeftButton" data-dropdown-toggle="dropdownLeft" data-dropdown-placement="left" class="mb-3 ml-8 md:mb-0 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"><svg class="w-2.5 h-2.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>Volver</button>
        </a>
        <div class="container py-8 grid grid-cols-4 m-4 bg-white rounded">
            <div class="col-span-4 card">
                <div class="card">
                    {!! Form::open(['route' => ['publicar.crearF', $usuario->id], 'files' => true, 'method' => 'put']) !!}
                     
                                <label class="block mb-2 text-lg ml-4 font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('titulo', 'Titulo del anuncio') !!}</label>
                                {!! Form::text('titulo', null, ['class' => ' ml-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-11/12  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                                @error('titulo')
                                    <strong class="text-xs ml-8 text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            {!! Form::hidden('user_id', auth()->user()->id) !!} 
                          
                            <div class="m-8">
                                
                                {!! Form::hidden('slug', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block mb-2  font-medium text-lg  text-gray-900 dark:text-white" for="small_size">{!! Form::label('descripcion', 'Descripcion del anuncio') !!}</label>
                                {!! Form::textarea('descripcion', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <div class="m-8">
                                <label class="text-lg ml-4 block mb-2 mt-4 font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('celular', 'Tu numero de celular') !!}</label>
                                {!! Form::text('celular', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <div>
                             <!-- Sección de selección de sector -->
                            {!! Form::label('sector', 'Selecciona el sector', ['class' => '  text-lg ml-12 block mb-2 font-medium text-gray-900 dark:text-white']) !!}
                            {!! Form::select('sector', $sectores,  null, ['class' => ' w-300 ml-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                             
                            </div class="grid m-8">
                             <!-- Sección de selección de tipo de inmueble -->
                             <div>
                               {!! Form::label('inmueble', 'Selecciona el inmueble', ['class' => ' text-lg ml-12 block mb-2 mt-4 font-medium text-gray-900 dark:text-white']) !!}
                               {!! Form::select('inmueble', $tipo_inmuebles,  null, ['class' => ' w-200 ml-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                               </div>
                            <div class="m-8">
                            <label class="block mb-2 text-lg ml-6 font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('pago_mensual', 'Pago mensual') !!}</label>
                                {!! Form::text('pago_mensual', null,['class' => 'w-200 ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <fieldset>
                                {!! Form::label('map', 'Ubicación',['class'=> 'text-lg ml-14 block mb-2 mt-4 font-medium text-gray-900 dark:text-white'] ) !!}
                                <div id="map"  style="height: 400px; margin:3rem"></div><br>
                                {!! Form::hidden('latitud', null, ['id' => 'latitud']) !!}
                                {!! Form::hidden('longitud', null, ['id' => 'longitud']) !!}
                            </fieldset>
                            <script>
                                var map = L.map('map').setView([-1.571269,  -79.006827], 13);
                                var popup = L.popup();
                                function onMapClick(e) {
                                    popup
                                    .setLatLng(e.latlng)
                                    .setContent("Has clickeado en la ubicacion con coordenadas " + e.latlng.toString())
                                    .openOn(map);
                                }
                                map.on('click', onMapClick);
                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                }).addTo(map);
                            
                                map.on('click', function(e) {
                                    var latitud = e.latlng.lat.toFixed(6);
                                    var longitud = e.latlng.lng.toFixed(6);
                                    document.getElementById('latitud').value = latitud;
                                    document.getElementById('longitud').value = longitud;
                                });
                            </script>

                            <div class="m-8">
                                <label class="block mb-6 text-lg font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('nombre_calle', 'Nombre de la calle') !!}</label>
                                {!! Form::text('nombre_calle', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <div class="m-8">
                                <label class="block mb-6 text-lg font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('referencia', 'Referencia') !!}</label>
                                {!! Form::text('referencia', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                         
                            <div class="m-8">
                                <label class="block mb-6 text-lg  font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('garantia_valor', ' Valor de la garantia') !!}</label>
                                {!! Form::text('garantia_valor', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
                            </div>
                            <div class="m-8">
                                <h1 class="text2x1 font-medium mt-8 mb-2">Imagen principal </h1>
                                <h1 class=" font-xs text-gray-500 mb-2">Trata de escoger una imagen, donde se vea el exterior del inmueble </h1>
                                <div class="flex gap-4">
                                    <figure class="flex">
                                        <img  class=" w-1/2 ml-4 h-64 bg-cover bg-center" src="{{ Storage::url('recursos/edificioE.webp')}}" alt="">
                                        <img id="picture" class="w-600 w-1/2 ml-4 flex h-64 bg-cover bg-center" src="{{ Storage::url($anuncio->foto_url) }}" alt="">
                                   
                                    </figure>
                                    <div>
                                        <p>Cambia la foto principal de tu anuncio</p>
                                        {!! Form::file('foto_url', ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','autocomplete' => 'off','id'=>'file']) !!}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="mb-4 mt-4 ml-12 font-semibold text-gray-900 dark:text-white">Servicios basicos</h3>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($servicios_basicos as $id => $servicio)
                                        @php
                                            $servicio = trim($servicio, '["]');
                                        @endphp
                                        <li class="w-full m-4 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                {!! Form::checkbox('servicio_basico[]', $servicio, false, ['id' => 'servicio_basico-' . $id, 'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                                                {!! Form::label('servicio_basico-' . $id, $servicio, ['class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                
                                <h3 class="mb-4 mt-4 ml-12 font-semibold text-gray-900 dark:text-white">Servicios adicionales</h3>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    @foreach($servicios_adicionales as $id => $servicio)
                                        @php
                                            $servicio = trim($servicio, '["]');
                                        @endphp
                                        <li class="w-full m-4 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                {!! Form::checkbox('servicio_adicional[]', $servicio, false, ['id' => 'servicio_adicional-' . $id, 'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                                                {!! Form::label('servicio_adicional-' . $id, $servicio, ['class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                            <div class="flex ">
                                {!! Form::submit('Crear anuncio', ['class'=>'mt-8 ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}
                                
                            </div>
                            <x-slot name="js">

                                <script>
                                  
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
                                </script>
                                
                            </x-slot>
                        {!! Form::close() !!}
</x-app-layout>