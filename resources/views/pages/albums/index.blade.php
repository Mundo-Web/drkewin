<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <div class="grid grid-cols-3 gap-4 ">
                @foreach ($albums as $album)
                   <div>
                       <a href="{{ route('albums.create',$album->id) }}">
                           <div class="border p-4 rounded shadow">
                               <a href="{{ route('albums.show', $album->id) }}">
                                   <div class="text-center">
                                       <i class="fa-solid fa-folder fa-5x "></i>
                                       <h3 class="text-lg font-bold mt-2">{{ $album->name }}</h3>
                                       <p>{{ $album->children_count }} subálbumes, {{ $album->images_count }} imágenes</p>
                                   </div>
                               </a>
                           </div>
                       </a>
                   </div>
                @endforeach
            </div>





    </div>

    <script>



    </script>

</x-app-layout>