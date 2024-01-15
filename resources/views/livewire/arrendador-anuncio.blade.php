<div>
    <div class="bg-fondo ">
        
        <h1 class="text-center  bg-fondo text-white ">Bienvenido {{$usuario->name}}</h1> 
        <a href="perfil/{{$usuario->id}}/crear">
            <h1 class="text-left ml-8 text-lg text-white">Crea tu anuncio</h1>  
        </a>  
       
       

        
       {{--  <div class="p-4 sm:ml-80  ">
            <div class="p-4  border-gray-200  rounded-lg dark:border-gray-700">
                    <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    @foreach ($visitas as $numero)
                    {{$numero->visitas}}
                    @endforeach
                </div>

                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    
                </div>
            </div>
        </div>
        </div> --}}
      
        
        <div class="relative m-8 overflow-x-auto shadow-md sm:rounded-lg">
            @if ($anuncios->count())
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Titulo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sector
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo inmueble
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pecio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Editar anuncio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ocultar/publicar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Eliminar
                        </th>
                    </tr>
                </thead>
               
        
                <tbody>
                

                    @foreach ($anuncios as $anuncio)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="anuncio/{{ $anuncio['slug'] }}">
                            {{$anuncio->titulo}}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{$anuncio->sector}}
                        </td>
                        <td class="px-6 py-4">
                            {{$anuncio->tipo_inmueble}}
                        </td>
                        <td class="px-6 py-4">
                            ${{$anuncio->pago_mensual}}
                        </td>
                        <td class="px-6 py-4">
                            
                            <a href="anuncio/{{$anuncio->slug}}/editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            
                        </td>

                        <td class="px-6 py-4">
                            <button wire:click="toggleAnuncio({{ $anuncio->id }})" class="px-4 py-2 rounded text-white {{ $anuncio->estado == 1 ? 'bg-blue-600' : 'bg-red-600' }}">
                                {{ $anuncio->estado == 1 ? 'Publicado' : 'No Publicado' }}
                            </button>
                        </td>
                        
                        
                        

                        <td class="px-6 py-4">
                           
                            <button  data-modal-target="popup-modal-{{ $anuncio->id }}" data-modal-toggle="popup-modal-{{ $anuncio->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Eliminar
                            </button>
                            
                       
                            
                                
                            <div id="popup-modal-{{ $anuncio->id }}" wire:keydown="limpiar" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"  class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" wire:keydown="limpiar" data-modal-hide="popup-modal-{{ $anuncio->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas seguro que deseas eliminar este anuncio?</h3>
                                            
                                            <button  wire:keydown="limpiar"  wire:click="eliminarAnuncio({{ $anuncio->id }})" data-modal-hide="popup-modal-{{ $anuncio->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Si, eliminar
                                            </button>
                                          
                                            <button wire:keydown="limpiar"  data-modal-hide="popup-modal-{{ $anuncio->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="">
                {{$anuncios->links()}}
            </div>
            @else
                <div class="">
                    <strong> No hay anuncios, crea uno ahora</strong>
                </div>
            @endif
        </div>
        

      


       <footer class="bg-fondo mb-60 ">
 

 
       </footer>

   

    </div>
</div>