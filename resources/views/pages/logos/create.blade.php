<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <form action="{{ route('logos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div
                class="col-span-full xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
                <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
                    <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-2xl tracking-tight">Agregar nueva
                        imagen</h2>
                </header>

                <div class="p-3">
                    <div class="rounded shadow-lg p-4 px-4 ">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <label for="title">Título de la imagen</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <input type="text" id="title" name="title" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Título">
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="description">Descripcion</label>
                                <div class="relative mb-2  mt-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </div>
                                    <input type="text" id="description" name="description" value=""
                                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Descripcion">
                                </div>
                            </div>

                            <div class="md:col-span-5">
                                <label for="imagen">Imagen principal <span class="text-red-500">( formato jpg,png |
                                        resolucion 1920 x 1280 )</span></label>
                                <div class="relative mb-2  mt-2">
                                    <input id="imagen" name="imagen"
                                        class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                </div>
                            </div>

                            <div class="md:col-span-5 text-right mt-6">
                                <div class="inline-flex items-end">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Guardar
                                        imagen
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $('document').ready(function() {

            tinymce.init({
                selector: 'textarea#description',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'table'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px;}'
            });

        })
    </script>

</x-app-layout>
