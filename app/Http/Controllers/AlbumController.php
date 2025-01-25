<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::whereNull('parent_id')->withCount('images', 'children')->get();
        return view('pages.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $album->load('children', 'images');
        return view('pages.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
    }

    public function destroyImage(AlbumImage $image)
    {
        try {
            // Eliminar archivo físico
            if ($image->url_image && file_exists($image->url_image)) {
                unlink($image->url_image);
            }

            // Eliminar registro de la base de datos
            $image->delete();

            return response()->json([
                'success' => true,
                'message' => 'Imagen eliminada correctamente.'
            ]);
        } catch (\Exception $e) {
            // Log::error('Error al eliminar imagen: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un problema al eliminar la imagen.'
            ], 500);
        }
    }

    public function uploadImages(Request $request, Album $album)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg|max:2048', // Validar todas las imágenes
        ], [
            'images.*.required' => 'Por favor selecciona al menos una imagen para cargar.',
            'images.*.image' => 'El archivo debe ser una imagen válida.',
            'images.*.mimes' => 'Solo se permiten imágenes con formato PNG o JPG.',
            'images.*.max' => 'El tamaño máximo permitido por imagen es 10MB.',
        ]);

        if ($request->hasFile('images')) {
            $manager = new ImageManager(new Driver());

            foreach ($request->file('images') as $file) {
                // Generar un nombre único para la imagen
                $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

                // Leer la imagen con Intervention Image
                $img = $manager->read($file);

                // Ruta para guardar la imagen en una carpeta específica del álbum
                $ruta = 'storage/images/albums/' . $album->name . '/';

                // Crear la carpeta si no existe
                if (!is_dir(public_path($ruta))) {
                    mkdir(public_path($ruta), 0777, true);
                }

                // Guardar la imagen en la carpeta
                $img->save(public_path($ruta . $nombreImagen));

                // Guardar la información en la base de datos
                $album->images()->create([
                    'url_image' => $ruta . $nombreImagen,
                    'name_image' => $nombreImagen,
                ]);
            }

            return redirect()->route('albums.show', $album->id)->with('success', 'Imágenes subidas y optimizadas correctamente.');
        }

        return back()->with('error', 'No se pudo subir las imágenes.');
    }
    /*  public function uploadImages(Request $request, Album $album)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg|max:20480', // Aumentado a 10 MB
        ], [
            'images.*.required' => 'Por favor selecciona al menos una imagen para cargar.',
            'images.*.image' => 'El archivo debe ser una imagen válida.',
            'images.*.mimes' => 'Solo se permiten imágenes con formato PNG o JPG.',
            'images.*.max' => 'El tamaño máximo permitido por imagen es 10MB.',
        ]);

        if ($request->hasFile('images')) {

            $manager = new ImageManager(new Driver());

            foreach ($request->file('images') as $file) {
                if (!$file->isValid()) {
                    return back()->with('error', 'Hubo un problema con la carga de la imagen.');
                }
                $nombreImagen = Str::random(10) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.jpg';
                $ruta = 'storage/images/albums/' . $album->name . '/';

                if (!is_dir(public_path($ruta))) {
                    mkdir(public_path($ruta), 0777, true);
                }

                // Crear y guardar la imagen usando Intervention Image
                $img = $manager->read($file);
                // encode('jpg', 90); // Calidad al 90%

                $img->save(public_path($ruta . $nombreImagen));

                // Optimizar la imagen usando spatie/laravel-image-optimizer
                $optimizer = OptimizerChainFactory::create();
                $optimizer->optimize(public_path($ruta . $nombreImagen));

                // Guardar en la base de datos
                $album->images()->create([
                    'url_image' => $ruta . $nombreImagen,
                    'name_image' => $nombreImagen,
                ]);
            }

            return redirect()->route('albums.show', $album->id)->with('success', 'Imágenes subidas y optimizadas correctamente.');
        }

        return back()->with('error', 'No se pudo subir las imágenes.');
    }*/
}
