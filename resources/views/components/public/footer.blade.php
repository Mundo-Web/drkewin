<footer class="bg-bgAzul font-outfit text-textWhite">
    <div class="w-11/12 mx-auto flex flex-col gap-10 pt-12 "> {{-- py-12 --}}
        <div class="flex flex-col 2md:flex-row 2md:justify-between  pb-10 gap-12 2md:gap-24" > {{-- border-b-2 border-white -  data-aos="fade-up" data-aos-offset="150"  --}}

            <div class="flex flex-col gap-5 basis-1/3">
                <div class="flex flex-col gap-3">
                    <h2 class="font-bold text-text28 xl:text-text32">Dr. Kewin Quispe de la Roca</h2>
                    <p class="font-normal text-text14 xl:text-text18 w-full">
                        Es un especialista en cirugía del aparato digestivo orientado a tratar problemas de vesícula biliar, hernias de la pared abdominal y obesidad.
                    </p>
                </div>
                <div class="font-semibold text-text16 xl:text-text20">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{$generales->whatsapp}}&text={{$generales->mensaje_whatsapp}}"
                        class="bg-bgCeleste py-3 px-5 rounded-xl inline-block text-center hover:bg-bgCelesteStrong md:duration-500 w-full 2md:w-auto">Solicitar
                        una cita
                    </a>
                </div>

                <div
            class="flex flex-col gap-5 2md:flex-row 2md:justify-between items-start 2md:items-center text-text14 xl:text-text18">
            
            <div class="flex justify-start 2md:justify-between gap-5 w-full 2md:w-auto">

                @if ($generales->instagram != null)
                    <a target="_blank" href="https://{{$generales->instagram}}">
                        <img src="{{ asset('images/svg/instagram.svg') }}" alt="instagram">
                    </a>
                @endif

                @if ($generales->facebook != null)
                    <a target="_blank" href="https://{{$generales->facebook}}">
                        <img src="{{ asset('images/svg/facebook.svg') }}" alt="facebook">
                    </a>
                @endif

                @if ($generales->linkedin != null)
                    <a target="_blank" href="https://{{$generales->linkedin}}">
                        <img src="{{ asset('images/svg/linkedin.svg') }}" alt="linkedin">
                    </a>
                @endif

                @if ($generales->tiktok != null)
                    <a target="_blank" href="https://{{$generales->tiktok}}">
                        <img src="{{ asset('images/svg/tiktok.svg') }}" alt="tiktok">
                    </a>
                @endif

            </div>
        </div>
            </div>
       
            <div class="flex flex-col 2md:flex-row gap-12 2md:gap-16 basis-2/3 2md:justify-end">
                <div class="flex flex-col gap-5">
                    <p class="font-medium text-text16 xl:text-text20">Enlaces</p>
                    <div class="flex flex-col gap-2">
                        <a href="{{route('index')}}" class="font-normal text-text14 xl:text-text18 block">Inicio</a>
                        <a href="{{route('servicios')}}" class="font-normal text-text14 xl:text-text18 block">Servicios</a>
                        <a href="{{route('nosotros')}}" class="font-normal text-text14 xl:text-text18 block">Acerca del Doctor</a>
                        <a href="{{route('blogs')}}" class="font-normal text-text14 xl:text-text18 block">Blogs</a>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <p class="font-medium text-text16 xl:text-text20">
                        Datos de contacto
                    </p>
                    <div class="flex flex-col gap-2">
                        <p class="font-normal text-text14 xl:text-text18">
                            {{$generales->address}}, {{$generales->inside}} {{$generales->district}}
                        </p>
                        <div class="font-normal text-text14 xl:text-text18">
                            <p>Correo Electrónico:</p>
                            <p href="#">{{$generales->email}}</p>
                        </div>
                        <div class="font-normal text-text14 xl:text-text18">
                            <span>Teléfono:</span> <span>{{$generales->office_phone}}</span>
                            {{-- <p href="#">{{$generales->office_phone}}</p> --}}
                        </div>

                        <div class="font-normal text-text14 xl:text-text18 py-2">
                            <p class="font-bold">Centro Médico Qualis</p>
                            <p>Dirección : <a target="_blank" href="https://g.co/kgs/Dp16ft">Av. Brasil 2730</a></p>
                            <p>Consultorio Nro 503</p>
                            <p>Pueblo Libre</p>
                            
                        </div>

                        <div class="font-normal text-text14 xl:text-text18 py-2">
                            <p class="font-bold">Clínica Integrasalud</p>
                            <p>Dirección : <a target="_blank" href=" https://goo.gl/maps/tfQC3HLLDxBCLCva6
                                ">Av. Brasil 831</a> </p>
       
                            <p>Jesús Maria</p>
                            
                        </div>

                        <div class="font-normal text-text14 xl:text-text18 py-2">
                            <p class="font-bold">Clínica CREO - Cayetano Heredia</p>
                            <p>Dirección: <a target="_blank" href="https://g.co/kgs/qT97oP">Av. Eloy Espinoza 700</a></p>
                            <p>San Martín de Porres.</p>
                            
                        </div>

                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <p class="font-medium text-text16 xl:text-text20">Aviso Legal</p>
                    <div class="font-normal text-text14 xl:text-text18 flex flex-col gap-2">
                        <p>Política de Privacidad</p>
                        <p>Términos y Condiciones</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <a href="http://mundoweb.pe/" target="_blank">Copyright &copy; 2023 Mundo Web. Reservados todos los derechos</a> --}}

    </div>
</footer>



