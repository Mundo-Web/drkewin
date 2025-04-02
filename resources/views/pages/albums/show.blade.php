<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <section class="py-4 border-b border-slate-100 dark:border-slate-700">
            <button onclick="toggleModal(true)"
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
                        <a href="{{ route('albums.create', $child->id) }}">
                            <div class="border p-4 rounded shadow">
                                <a href="{{ route('albums.show', $child->id) }}">
                                    <div class="text-center">
                                        <i class="fa-solid fa-folder fa-5x "></i>
                                        <h3 class="text-lg font-bold mt-2">{{ $child->name }}</h3>
                                        <p>{{ $child->children_count }} subálbumes, {{ $child->images_count }} imágenes
                                        </p>
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
                        <img src="{{ asset($image->url_image) }}" alt="{{ $image->name_image }}"
                            class="w-full h-52 object-cover rounded-xl shadow-lg">
                        <button onclick="deleteImage('{{ route('albums.images.destroy', $image) }}')"
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
        <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-1/3 p-6 relative">
                <button onclick="toggleModal(false)" class="absolute top-2 right-2 text-gray-600 hover:text-gray-800">
                    <i class="fa-solid fa-times"></i>
                </button>
                <h2 class="text-xl font-semibold mb-2">Subir Imágenes</h2>
                <p class="text-red-500 text-sm mb-4">(formato jpg,png | resolución 1920x1280)</p>

                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" multiple class="block w-full p-2 border rounded mb-4"
                        id="imageInput">
                    <div id="progressContainer" class="hidden mb-4">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div id="uploadProgress" class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                        <p id="progressText" class="text-sm text-gray-600 mt-1">Subiendo imágenes... <span
                                id="counter">0</span>/<span id="total">0</span></p>
                    </div>
                    <button type="button" onclick="uploadImages()"
                        class="bg-blue-500 text-white px-4 py-2 rounded">Subir</button>
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


    <script>
        // Variable global para almacenar los archivos seleccionados
        let selectedFiles = [];
        const batchSize = 3; // Número de imágenes por lote

        document.getElementById('imageInput').addEventListener('change', function(e) {
            selectedFiles = Array.from(e.target.files);
            document.getElementById('total').textContent = selectedFiles.length;
        });

        async function uploadImages() {
            if (selectedFiles.length === 0) {
                alert('Por favor selecciona al menos una imagen');
                return;
            }

            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('uploadProgress');
            const progressText = document.getElementById('progressText');
            const counter = document.getElementById('counter');
            const total = document.getElementById('total');
            const uploadButton = document.querySelector('#uploadForm button');

            // Deshabilitar botón durante la subida
            uploadButton.disabled = true;
            uploadButton.textContent = 'Subiendo...';
            progressContainer.classList.remove('hidden');

            let uploadedCount = 0;
            let hasErrors = false;

            try {
                for (let i = 0; i < selectedFiles.length; i += batchSize) {
                    const batch = selectedFiles.slice(i, i + batchSize);

                    try {
                        const result = await processBatch(batch, uploadedCount + 1);
                        if (result.success) {
                            uploadedCount += batch.length;
                            counter.textContent = uploadedCount;
                            progressBar.style.width = `${(uploadedCount / selectedFiles.length) * 100}%`;
                            progressText.innerHTML =
                                `Subiendo imágenes... <span id="counter">${uploadedCount}</span>/<span id="total">${selectedFiles.length}</span>`;
                        } else {
                            throw new Error(result.message);
                        }
                    } catch (error) {
                        hasErrors = true;
                        progressText.innerHTML =
                            `Error: ${error.message} (${uploadedCount}/${selectedFiles.length} subidas)`;
                        break;
                    }
                }

                if (!hasErrors) {
                    progressText.innerHTML = '¡Todas las imágenes se han subido correctamente!';
                    setTimeout(() => {
                        toggleModal(false);
                        window.location.reload();
                    }, 2000);
                }
            } finally {
                uploadButton.disabled = false;
                uploadButton.textContent = 'Subir';
            }
        }

        async function processBatch(batch, startIndex) {
            const formData = new FormData();
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            batch.forEach((file, index) => {
                formData.append(`images[${index}]`, file); // Cambiado el índice para simplificar
            });

            try {
                const response = await fetch('{{ route('albums.upload', $album->id) }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    // Intentar parsear el error como JSON, si falla usar texto plano
                    let errorData;
                    try {
                        errorData = await response.json();
                    } catch {
                        throw new Error(await response.text());
                    }
                    throw new Error(errorData.message || 'Error en la subida');
                }

                return await response.json();
            } catch (error) {
                console.error('Error en processBatch:', error);
                throw new Error(error.message || 'Error de conexión');
            }
        }

        function toggleModal(show) {
            const modal = document.getElementById('uploadModal');
            if (show) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
                // Resetear el formulario al cerrar
                document.getElementById('uploadForm').reset();
                document.getElementById('progressContainer').classList.add('hidden');
                document.getElementById('uploadProgress').style.width = '0%';
                selectedFiles = [];
            }
        }
    </script>
</x-app-layout>
