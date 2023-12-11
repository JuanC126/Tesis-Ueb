<x-app-layout>
    <div class="bg-fondo">
    <h1 class="text-white text-center order-first  text-2xl font-semibold mb-8">Publicaciones Destacadas</h1>
   

<!-- component -->

<div class="max-w-2xl  mx-auto">

	<div id="default-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
            <!-- Item 1 -->
            @foreach ($anuncios as $home)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
               {{--  <span class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First Slide</span> --}}
                 <img src="{{ Storage::url($home['foto_url']) }}" class=" absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                </div>
                @endforeach 
            <!-- Item 2 -->
           {{--  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ Storage::url($home['foto_url']) }}" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div> --}}
            {{-- <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div> --}}
        </div>
        <!-- Slider indicators -->
       
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            @foreach ($anuncios as $index => $home)
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
        
 
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div>

<div class="bg-white py-10 m-6 bg-fondo sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base text-white leading-7 ">Nuevos anuncios todos los dias</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white  sm:text-5xl"><p>Total de anuncios: {{ $totalAnuncios }}</p></dd>
        </div>
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
         {{--  <dt class="text-base leading-7 text-white ">Assets under holding</dt> --}}
          <dd class="order-first text-3xl font-semibold tracking-tight text-white  sm:text-4    56xl">Tu proxima vivienda a un solo click</dd>
        </div>
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white ">Usuarios</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white  sm:text-5xl"> {{ $totalUsuarios }} Usuarios</dd>
        </div>
      </dl>
    </div>
  </div>
{{-- {{$storagePath = base_path('storage')}}; --}}

    <section class="mt-10">
        <h1 class="text-white text-center  text-2xl font-semibold  mb-6 ">Ultimas Publicaciones</h1>

        <div class="max-w-7x1 px-4 sm:px-6 lg:px-8 grid sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach($anuncios as $anuncio)
                <article class="bg-white shadow-lg rounded  overflow-hidden">
                    <a href="anuncio/{{ $anuncio['slug'] }}">
                        <div class="overflow-hidden w-auto h-80 relative ">
                            <img src="{{Storage::url( $anuncio['foto_url'])}}" alt="Img" class="w-full h-full object-cover" draggable="false">
                        </div>
                    </a>
                    <div class="px-6 py-4">
                        <h1 class="font-semibold">{{Str::limit($anuncio->titulo),10}}</h1>
                        <p class="font-semibold">${{$anuncio->pago_mensual}}</p>
                        <p>{{$anuncio->sector}}</p>
                        <p>{{$anuncio->tipo_inmueble}}</p> 
                            <!-- Muestra el contador de visitas -->
                            Visitas: {{ $anuncio->visitas->count() }}
                        


                        <ul class="flex text-sm">
                            <li>
                                {{-- <i class="fas fa-star"></i> --}}
                            </li>
                        </ul>
                    </div>
                    
                </article>
            @endforeach
        </div>
        

        <h1 class="text-white text-center text-2xl font-semibold  mt-8 mb-6 ">Publicaciones mas vistas</h1>

        <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($anunciosPorVisitas as $anuncio)
                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <a href="anuncio/{{ $anuncio['slug'] }}">
                        <div class="overflow-hidden w-auto h-80 relative object-cover" >
                            <img src="{{Storage::url( $anuncio['foto_url'])}}" alt="Img" class="w-full h-full object-cover" draggable="false">
                        </div>
                    </a>
                    <div class="px-6 py-4">
                        <h1 class="font-semibold">{{Str::limit($anuncio->titulo),10}}</h1>
                        <p class="font-semibold">${{$anuncio->pago_mensual}}</p>
                        <p>{{$anuncio->sector}}</p>
                        <p>{{$anuncio->tipo_inmueble}}</p> 
                            <!-- Muestra el contador de visitas -->
                            Visitas: {{ $anuncio->visitas_count }}
                        


                        <ul class="flex text-sm">
                            <li>
                               {{--  <i class="fas fa-star"></i> --}}
                            </li>
                        </ul>
                    </div>
                    
                </article>
            @endforeach
        </div>

           

        
    </section>



    <section>
        <div class="text-center text-3x1 mb-6 ">

        </div>
    </section>

    

</div>
</x-app-layout>



