@foreach ($posts as $post)
    <div class="bg-bgRosa rounded-xl shadow-md overflow-hidden">
        <img src="{{ asset($post->url_image) }}" alt="{{ $post->title }}" class="w-full object-cover" loading="lazy" />
        <div class="p-4">
            <h3 class="font-bold text-textAzul text-text24 mb-2 line-clamp-2">{{ $post->title }}</h3>
            <div class="line-clamp-2   text-textAzul text-text16 mb-4 ">
                {!! $post->description !!}
            </div>
            <a href="{{ route('detalle-post', $post->slug) }}"
                class="block bg-bgCeleste text-white font-bold px-6 py-3 rounded-md hover:bg-bgCelesteStrong transition w-full text-center ">
                Leer más
            </a>
        </div>
    </div>
@endforeach


@if ($posts instanceof \Illuminate\Pagination\LengthAwarePaginator && $posts->hasPages())
    <div class="pagination col-span-5">
        {{ $posts->links() }}
    </div>
@endif
