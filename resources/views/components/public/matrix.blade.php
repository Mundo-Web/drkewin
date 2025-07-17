<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="language" content="spanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    {{-- SEO Meta Tags --}}
    @if(isset($generales))
        <title>{{ $generales->meta_title ?? 'Dr. Kewin Quispe - experto en cirugía gastrointestinal' }}</title>
        <meta name="description" content="{{ $generales->meta_description ?? 'Expertos en vesícula, hernias, balón gástrico, cinta gástrica, problema de obesidad e induvicales. Consulta el precio aquí.' }}">
        <meta name="keywords" content="{{ $generales->meta_keywords ?? 'cirugía, vesícula, hernias, balón gástrico, obesidad' }}">
        
        {{-- Canonical URL --}}
        @if($generales->canonical_url)
            <link rel="canonical" href="{{ $generales->canonical_url }}">
        @endif
        
        {{-- Open Graph Meta Tags --}}
        <meta property="og:title" content="{{ $generales->og_title ?? $generales->meta_title ?? 'Dr. Kewin Quispe - experto en cirugía gastrointestinal' }}">
        <meta property="og:description" content="{{ $generales->og_description ?? $generales->meta_description ?? 'Expertos en vesícula, hernias, balón gástrico, cinta gástrica, problema de obesidad e induvicales.' }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        @if($generales->og_image)
            <meta property="og:image" content="{{ asset($generales->og_image) }}">
            <meta property="og:image:alt" content="{{ $generales->og_title ?? 'Dr. Kewin Quispe' }}">
        @endif
        <meta property="og:site_name" content="Dr. Kewin Quispe">
        
        {{-- Twitter Card Meta Tags --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $generales->og_title ?? $generales->meta_title ?? 'Dr. Kewin Quispe - experto en cirugía gastrointestinal' }}">
        <meta name="twitter:description" content="{{ $generales->og_description ?? $generales->meta_description ?? 'Expertos en vesícula, hernias, balón gástrico, cinta gástrica, problema de obesidad e induvicales.' }}">
        @if($generales->og_image)
            <meta name="twitter:image" content="{{ asset($generales->og_image) }}">
        @endif
        
        {{-- Structured Data --}}
        @if($generales->structured_data)
            <script type="application/ld+json">
                {!! $generales->structured_data !!}
            </script>
        @endif
    @else
        <title>Dr. Kewin Quispe - experto en cirugía gastrointestinal</title>
        <meta name="description" content="Expertos en vesícula, hernias, balón gástrico, cinta gástrica, problema de obesidad e induvicales. Consulta el precio aquí.">
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- fontawesome --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="icon" href="{{asset('images/svg/Logo_redondo_2.svg')}}" type="image/svg+xml"> --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    </script>

    {{-- Aqui van los CSS --}}
    @yield('css_improtados')

    {{-- Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body id="inicio">
    @include('components.public.header')

    <div class="bg-white">
        {{-- Aqui va el contenido de cada pagina --}}
        @yield('content')

    </div>

    @include('components.public.footer')


    @yield('scripts_improtados')

    <script>
        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarTelefono(value) {
            if (value !== '') {
                if (isNaN(value)) {
                    alerta("Por favor, asegúrate de ingresar solo números en el teléfono");
                    return false;
                }
            }

            if (value.length < 9) {
                alerta("El teléfono solo puede tener 9 dígitos");
                return false;
            }

            return true;
        }

        function validarEmail(value) {
            console.log(value)
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("Por favor, asegúrate de ingresar una dirección de correo electrónico válida");
                return false;
            }
            return true;
        }

        $('#formContactos').submit(function(event) {

            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarTelefono($('#telefono').val())) {
                return;
            };

            if (!validarEmail($('#email').val())) {
                return;
            };

            Swal.fire({

                title: 'Procesando información',
                html: `Enviando... 
                    <p class=" text-text12">Revise su correo de Span</p>
                        <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                            <div role="status">
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                
                            </div>
                        </div>                  
                        `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route('guardarContactos') }}',
                method: 'POST',
                data: formDataArray,
                success: function(response) {

                    Swal.close();

                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });

                    $('#formContactos')[0].reset();

                },
                error: function(error) {
                    Swal.close();
                    const obj = error.responseJSON.message;
                    const keys = Object.keys(error.responseJSON.message);
                    let flag = false;
                    keys.forEach(key => {
                        if (!flag) {
                            const e = obj[key][0];
                            Swal.fire({
                                title: error.message,
                                text: e,
                                icon: "error",
                            });
                            flag = true; // Marcar como mostrado
                        }
                    });
                }
            });
        })
        $('#newsletterForm').submit(function(event) {
            event.preventDefault();
            let formDataArray = $(this).serializeArray();

            if (!validarEmail($('#emailSubscriptor').val())) {
                return;
            };

            Swal.fire({

                title: 'Procesando información',
                html: `Enviando... 
                    <p class=" text-text12">Espere un momento</p>
                        <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4 ">
                            <div role="status">
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                
                            </div>
                        </div>                  
                        `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '{{ route('guardarSubscriptor') }}',
                method: 'POST',
                data: {
                    email: $('#emailSubscriptor').val(), // Envía directamente el valor del campo de email
                    _token: $('input[name="_token"]').val() // Incluye el token CSRF
                },
                success: function(response) {
                    Swal.close();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#newsletterForm')[0].reset();
                },
                error: function(error) {
                    Swal.close();
                    console.log(error);
                }
            });
        });
    </script>

</body>

</html>
