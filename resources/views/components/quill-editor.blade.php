@props([
    'name' => 'content',
    'id' => null,
    'defaultValue' => '',
    'placeholder' => 'Escribe aquí...',
    'toolbarOptions' => null,
    'height' => '300px',
])

@php
    // Configuración por defecto de la barra de herramientas
    $defaultToolbar = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [['header' => 1], ['header' => 2]],
        [['list' => 'ordered'], ['list' => 'bullet']],
        [['script' => 'sub'], ['script' => 'super']],
        [['indent' => '-1'], ['indent' => '+1']],
        [['direction' => 'rtl']],
        [['size' => ['small', false, 'large', 'huge']]],
        [['header' => [1, 2, 3, 4, 5, 6, false]]],
        [['color' => []], ['background' => []]],
        [['font' => []]],
        [['align' => []]],
        ['clean'],
        ['link', 'image', 'video'],
    ];

    $id = $id ?? 'quill-editor-' . uniqid();
    $inputId = 'quill-editor-area-' . $name;
    $toolbarOptions = $toolbarOptions ?? $defaultToolbar;
    $toolbarOptionsJson = json_encode($toolbarOptions);
@endphp

<div {{ $attributes->merge(['class' => 'quill-editor-container']) }}>
    <!-- Editor Container -->
    <div id="{{ $id }}" style="height: {{ $height }}"></div>

    <!-- Hidden Input -->
    <input type="hidden" name="{{ $name }}" id="{{ $inputId }}"
        value="{{ htmlspecialchars($defaultValue) }}" />
</div>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editorElement = document.getElementById('{{ $id }}');
            if (!editorElement) return;

            const quill = new Quill(editorElement, {
                theme: 'snow',
                placeholder: '{{ $placeholder }}',
                modules: {
                    toolbar: {!! $toolbarOptionsJson !!}
                }
            });

            const hiddenInput = document.getElementById('{{ $inputId }}');

            // Establecer valor inicial
            if (hiddenInput.value) {
                try {
                    quill.root.innerHTML = hiddenInput.value;
                } catch (e) {
                    console.error('Error al cargar el contenido inicial:', e);
                }
            }

            // Sincronizar cambios con el input oculto
            quill.on('text-change', function() {
                hiddenInput.value = quill.root.innerHTML;
            });
        });
    </script>
@endpush
