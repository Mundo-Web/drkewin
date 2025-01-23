<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <section class="py-4 border-b border-slate-100 dark:border-slate-700">
            <button
                    onclick="toggleModal(true)"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-sm">
                <i class="fa-solid fa-plus mr-2"></i> Subir Imagen
            </button>
        </section>
        <h1 class="text-text32 font-bold mb-4">{{ $album->name }}</h1>
        <p class="text-text16 mb-4">{{ $album->description }}</p>

        <!-- Subálbumes -->
        @if ($album->children->isNotEmpty())

            <div class="grid grid-cols-3 gap-4 mb-6">
                @foreach ($album->children as $child)
                  <div>
                      <a href="{{ route('albums.create',$child->id) }}">
                          <div class="border p-4 rounded shadow">
                              <a href="{{ route('albums.show', $child->id) }}">
                                  <div class="text-center">
                                      <i class="fa-solid fa-folder fa-5x "></i>
                                      <h3 class="text-lg font-bold mt-2">{{ $child->name }}</h3>
                                      <p>{{ $child->children_count }} subálbumes, {{ $child->images_count }} imágenes</p>
                                  </div>
                              </a>
                          </div>
                      </a>
                  </div>
                @endforeach
            </div>
        @endif

        <!-- Imágenes -->
        @if ($album->images->isNotEmpty())
            <div class="grid grid-cols-3 gap-4">
                @foreach ($album->images as $image)
                    <div class="relative group">
                        <img src="{{ asset( $image->url_image) }}" alt="{{ $image->name_image }}" class="w-full h-52 object-cover rounded-xl shadow-lg">
                        <button
                                onclick="deleteImage('{{ route('albums.images.destroy', $image) }}')"
                                class="absolute top-2 right-2 bg-red-600 text-white px-2 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No hay imágenes en este álbum.</p>
        @endif

        <!-- Modal para Subir Imágenes -->
        <div
                id="uploadModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-1/3 p-6 relative">
                <button
                        onclick="toggleModal(false)"
                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                    <i class="fa-solid fa-times"></i>
                </button>
                <h2 class="text-xl font-semibold mb-4">Subir Imágenes</h2>
                <form action="{{ route('albums.upload', $album->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" multiple class="block w-full p-2 border rounded mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Subir</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(show) {
            const modal = document.getElementById('uploadModal');
            if (show) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        function deleteImage(url) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('No se pudo eliminar la imagen.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    '¡Eliminado!',
                                    data.message,
                                    'success'
                                ).then(() => {
                                    location.reload(); // Recargar la página
                                });
                            } else {
                                Swal.fire('Error', 'No se pudo eliminar la imagen.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error al eliminar la imagen:', error);
                            Swal.fire('Error', 'Ocurrió un problema al eliminar la imagen.', 'error');
                        });
                }
            });
        }
    </script>
</x-app-layout>