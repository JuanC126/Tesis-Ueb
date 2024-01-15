<div>
    <form wire:submit.prevent="buscar">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative mb-8 px-10">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 ml-10 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:keydown="refrescar" wire:model="search" type="search" id="default-search" class=" overflow-hidden w-full p-4  ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lugar, precios, sector, servicios" required>
            <button type="submit" class="text-white mr-10 absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
        </div>
    </form>
    

    <div class="ml-4 lg:ml-8 lg:mr-8 mr-4 mb-10 gap-x-8 gap-y-4  grid lg:grid-cols-7  gap-4 grid-cols-2">
        <!-- Dropdown 1 Tipo de inmueble -->
 
            <button id="dropdownSearchButton"  data-dropdown-toggle="dropdown1" class="flex text-gray-900 bg-white  hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                Tipo Inmueble
                <svg class="w-2.5 h-2.5 ml-auto mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
           
                <!-- Dropdown menu -->
                <div id="dropdown1" class="  z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-900" aria-labelledby="dropdownDefaultButton">
                        <li>    
                            @foreach($tipo_inmuebles as $anuncio)
                            <a  class="cursor-pointer block px-4 py-2 hover-bg-gray-100 dark:hover-bg-gray-600 dark:hover-text-white" wire:keydown="refrescar" wire:click="$set('inmueble_id',{{$anuncio->id}})" wire:click="$set('open', false)" >{{$anuncio->inmueble}}</a>
                            @endforeach
                        </li>
                      
                    </ul>
                </div>
            <!-- Dropdown 1 Final -->

            <!-- Dropdown 2 Precio-->
                <button id="dropdownPrecioButton" data-dropdown-toggle="dropdown2" class="flex text-gray-900 bg-white  hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    Precio
                    <svg class="w-2.5 h-2.5 ml-auto mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
            
                <!-- Dropdown menu -->
                <div id="dropdown2" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-900" aria-labelledby="dropdownPrecioButton">
                        <li>
                            <a class="cursor-pointer block px-4 py-2 hover-bg-gray-100 dark:hover-bg-gray-600 dark:hover-text-white" wire:keydown="refrescar" wire:click="$set('precio_range', null)">Todos</a>
                        </li>
                        @foreach($precios as $valor => $etiqueta)
                            <a class="cursor-pointer block px-4 py-2 hover-bg-gray-100 dark:hover-bg-gray-600 dark:hover-text-white" wire:keydown="refrescar" wire:click="$set('precio_range', '{{$valor}}')" wire:click="$set('open', false)">{{$etiqueta}}</a>
                        @endforeach
                    </ul>
                </div>
             <!-- Dropdown 2 Precio final-->

        <!-- Dropdown 3 sector -->
        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom" class="flex text-gray-900 bg-white  hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button"> Sectores 
            <svg class="w-2.5 h-2.5 ml-auto mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg></button>

        <!-- Dropdown menu -->
        <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
            
        
            <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
               
                    @foreach($sectores as $anuncio)
                    <li>
                        <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover-bg-gray-600">
                            <label class="w-full py-2 ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300" wire:keydown="refrescar" wire:click="$set('sector_id', {{$anuncio->id}})" wire:click="$set('open', false)">{{$anuncio->sector}}</label>
                        </div>
                    </li>
                    @endforeach
              
            </ul>
            
        </div>

         <!-- Dropdown 4 -->
            <button id="dropdownSearchButton" wire:keydown="refrescar" data-dropdown-toggle="dropdown4" class=" text-gray-900 bg-white  hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">
                Servicios
                <svg class="w-2.5 h-2.5 ml-auto mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
           
                <!-- Dropdown menu -->
            <div id="dropdown4" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-900" aria-labelledby="dropdownDefaultButton">
                    @foreach($serviciosAdicionales as $servicio )
                        <a wire:keydown="refrescar" class="cursor-pointer block px-4 py-2 hover-bg-gray-100 dark:hover-bg-gray-600 dark:hover-text-white" 
                        wire:click="SerAdic('{{ $servicio->adicionales }}')" 
                        wire:click="$set('open', false)">
                        {{ $servicio->adicionales }}
                        </a>
                    @endforeach

                </ul>
            </div>
            {{-- fin dropdown4 --}}

            {{-- boton de limpiar filtros --}}
{{--             <button wire:click="refrescar"  data-dropdown-toggle="limpiar" class=" text-gray-900 bg-red-500  hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center inline-flex items-center " type="button">
 --}}               {{-- git --}}
                {{-- <svg class="w-2.5 h-2.5 ml-auto mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg> --}}
            {{-- </button> --}}
            {{-- fin boton limpiar filtros --}}
    </div>
    
                    
            @if($anuncios->count())

{{-- tarjeta anuncio --}}
    <div class="p-4">
    @foreach($anuncios as $anuncio)

     <div class=" mb-4 max-w-screen-xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="grid grid-cols-1  sm:grid-cols-5">
        <div class=" w-300 h-300 p-1">
            <a href="anuncio/{{ $anuncio['slug'] }}">
                <img src="{{ Storage::url($anuncio['foto_url']) }}" alt="Imagen del anuncio" class="w-full h-60 relative object-cover">
            </a>
        </div>
        <div class="p-4 col-span-3">
            <p class="text-xl font-semibold">${{$anuncio->pago_mensual}}</p>
            <a href="anuncio/{{ $anuncio['slug'] }}">
                <h2 class="text-xl font-semibold">{{$anuncio->titulo}}</h2>
            </a>
            <p class="text-gray-900 text-xl sm:text-left">{{ ucwords($anuncio->sector) }}</p>
            <p class="text-gray-900 text-xl sm:text-left">{{ ucwords($anuncio->tipo_inmueble) }}</p>
            <p class="text-gray-900  sm:text-left">
                {{ Str::limit($anuncio->descripcion, 100) }}
            </p>
            <p>{{ str_replace(['[', ']', '"'], '  ', $anuncio->servicio_basico) }}</p>
            <p>{{ str_replace(['[', ']', '"'], '     ', $anuncio->servicio_adicional) }}</p>
        </div>
        </div>
    </div>

    @endforeach
    </div>
{{--fin tarjeta anuncio --}}     
         
        @else
             <p class="text-center w-screen h-screen bg-fondo text-white text-lg ">No hay anuncios disponibles. Prueba otra categoria</p>
         @endif
         <div class="lg:mr-10 mb-4 p-4 ">
            {{ $anuncios->links() }} 
        </div> 

       
</div>
