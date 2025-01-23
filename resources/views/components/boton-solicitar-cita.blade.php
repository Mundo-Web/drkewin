<div
        class="font-semibold text-text18 xl:text-text22 flex flex-col md:flex-row items-center justify-start gap-5">
    <a target="_blank"
       href="https://api.whatsapp.com/send?phone={{ $generales->whatsapp }}&text={{ $generales->mensaje_whatsapp }}"
       class="{{ $classes ?? 'bg-bgCeleste hover:bg-bgCelesteStrong ' }} py-3 px-5 rounded-xl inline-block text-center  md:duration-500 w-full md:w-auto text-white">
        Solicitar una cita
    </a>
</div>