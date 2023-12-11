<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('titulo', 'Titulo del anuncio') !!}</label>
    {!! Form::text('titulo', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>

<div class="m-8">
    {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('slug', 'slug del anuncio') !!}</label> --}}
    {!! Form::hidden('slug', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('descripcion', 'Descripcion del anuncio') !!}</label>
    {!! Form::textarea('descripcion', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('celular', 'Celular') !!}</label>
    {!! Form::text('celular', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<div>
 <!-- Sección de selección de sector -->
{!! Form::label('sector', 'Selecciona el sector', ['class' => ' m-8 ml-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
{!! Form::select('sector', $sectores, null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
 
</div class="grid m-8">
 <!-- Sección de selección de tipo de inmueble -->
 <div>
    <!-- Sección de selección de sector -->
   {!! Form::label('inmueble', 'Selecciona el inmueble', ['class' => ' ml-6 flex mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
   {!! Form::select('inmueble', $tipo_inmuebles, null, ['class' => '  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
   </div>
<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('pago_mensual', 'Pago mensual') !!}</label>
    {!! Form::text('pago_mensual', null,['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<label class="block ml-8 text-lg mb-2 font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('latitud', 'ubicacion') !!}</label>
{!! Form::hidden('latitud', $anuncio->latitud, ['id' => 'latitud', 'class' => 'form-input block w-full mt-1']) !!}
{!! Form::hidden('longitud', $anuncio->longitud, ['id' => 'longitud', 'class' => 'form-input block w-full mt-1']) !!}
<div id="mapid" class="ml-8" style=" height: 400px; width:800px;"></div>

<script>
    var latitud = parseFloat(document.getElementById('latitud').value) || -12.0464;
    var longitud = parseFloat(document.getElementById('longitud').value) || -77.0428;

    var map = L.map('mapid').setView([latitud, longitud], 13);

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

<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('nombre_calle', 'Nombre de la calle') !!}</label>
    {!! Form::text('nombre_calle', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('referencia', 'Referencia') !!}</label>
    {!! Form::text('referencia', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
{{-- <div class="m-8">
    {!! Form::label('garantia', 'Si') !!} 
    {!! Form::checkbox('garantia', 'valor', $anuncio->garantia) !!}
  
</div> --}} 

<div class="m-8">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">{!! Form::label('garantia_valor', ' Valor de la garantia') !!}</label>
    {!! Form::text('garantia_valor', null, ['class' => ' ml-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}
</div>
<div class="m-8">
    <h1 class="text2x1 font-bold mt-8 mb-2">Imagen principal </h1>
    <div class="flex gap-4">
        <figure>
            <img id="picture" class="w-600 h-64 bg-cover bg-center" src="{{ Storage::url($anuncio->foto_url) }}" alt="">
        </figure>
        <div>
            <p>Cambia la foto principal de tu anuncio</p>
            {!! Form::file('foto_url', ['class' => 'form-input  w-full mt-2','id'=>'foto_url']) !!}
        </div>
    </div>
</div>
<h3 class="mb-4 mt-4 font-semibold text-gray-900 dark:text-white">Servicios basicos</h3>
<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($anuncio->servicio_basico as $servicio)
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                @php
                    $servicio = trim($servicio, '["]');
                @endphp
                {!! Form::checkbox('servicio_basico[]', $servicio, true, ['id' => $servicio . '-checkbox-list', 'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                {!! Form::label($servicio . '-checkbox-list', $servicio, ['class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
            </div>
        </li>
    @endforeach
</ul>
<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($anuncio->servicio_adicional as $servicio)
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
            <div class="flex items-center pl-3">
                @php
                    $servicio = trim($servicio, '["]');
                @endphp
                {!! Form::checkbox('servicio_adicional[]', $servicio, true, ['id' => $servicio . '-checkbox-list', 'class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                {!! Form::label($servicio . '-checkbox-list', $servicio, ['class' => 'w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
            </div>
        </li>
    @endforeach
</ul>