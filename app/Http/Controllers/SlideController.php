<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Album;
use App\Models\ClientLogos;
use App\Models\General;
use App\Models\Slide;
use Illuminate\Http\Request;

//use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
//use Illuminate\Support\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slides = Slide::where('status', '=', true)->get();

        return view('pages.slide.index', compact('slides'));
    }

    public function mostrarFront()
    {
        $slides = Slide::where('status', '=', true)->get();
        $logos = ClientLogos::where('status', '=', true)->get();
        $generales = General::where('id', '=', 1)->get();
        return view('public.index', compact('slides', 'logos', 'generales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Paso 1: Validación de la solicitud
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image',
        ]);

        // Paso 2: Crear y guardar el servicio (si hay image SVG)
        $slide = new Slide();

        try {
            // Si la solicitud tiene un archivo de image
            if ($request->hasFile('image')) {
                // Obtener el archivo SVG
                $file = $request->file('image');
                $routeImg = 'storage/images/slides/';
                $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

                // Guardar el archivo SVG

                $this->saveImg($file, $routeImg, $nombreImagen);

                // Establecer la URL de la image SVG
                $slide->image = $routeImg . $nombreImagen;
            }

            // Guardar el resto de los datos del servicio
            $slide->btn_link = $request->btn_link;
            $slide->title = $request->title;
            $slide->description = $request->description;
            $slide->btn_text = $request->btn_text;
            // Estado y visibilidad
            $slide->status = 1; // Por ejemplo, activo
            $slide->visible = 1; // Visible

            // Guardar el servicio
            $slide->save();

            // Paso 7: Redirigir con mensaje de éxito
            return redirect()->route('slides.index')->with('success', 'Slide creado exitosamente.');
        } catch (\Throwable $th) {
            // Paso 8: Manejo de excepciones

            return response()->json(['message' => 'Error al procesar la solicitud. ' . $th->getMessage()], 400);
        }
    }

    public function storeJordan(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:svg|',
        ]);

        //tamaño imagees 808x445
        $slide = new Slide();

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $routeImg = 'storage/images/svgs/';
                $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
                $this->saveImg($file, $routeImg, $nombreImagen);
                $slide->image = $routeImg . $nombreImagen;
                // $slide->name_image = $nombreImagen;
            }
            $slide->btn_link = $request->link;
            $slide->title = $request->title;
            /* $slide->description = $request->description; */
            $slide->description = $request->description;

            $slide->btn_text = $request->btn_text;

            /*  */
            $slide->status = 1;
            $slide->visible = 1;

            $slide->save();

            return redirect()->route('slides.index')->with('success', 'Slide creado exitosamente.');
        } catch (\Throwable $th) {
            return response()->json(['messge' => 'Verifique sus datos ' . $th], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        $slides = Slide::find($slide->id);

        return view('pages.slide.edit', compact('slides'));
    }

    public function saveImg($file, $route, $nombreImagen)
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($file);
        if (!file_exists($route)) {
            mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
        }
        $img->save($route . $nombreImagen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrfail($id);


        $slide->title = $request->title;
        $slide->description = $request->description;
        $slide->btn_text = $request->btn_text;
        $slide->btn_link = $request->btn_link;

        try {

            if ($request->hasFile("image")) {
                $file = $request->file('image');
                $routeImg = 'storage/images/slides/';
                $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

                $this->saveImg($file, $routeImg, $nombreImagen);

                $slide->image = $routeImg . $nombreImagen;
                // $slide->name_image = $nombreImagen;
            }





            /*  */
            $slide->save();


            return redirect()->route('slides.index')->with('success', 'Slide actualizado exitosamente.');
        } catch (\Throwable $th) {

            return response()->json(['messge' => 'Verifique sus datos ' . $th], 400);
        }
    }

    private function updateAlbumAndFolder($oldTitle, $newTitle)
    {
        // Actualizar el título del álbum en la base de datos
        $album = Album::where('name', ucfirst(strtolower($oldTitle)))->first();
        if ($album) {
            $album->name = ucfirst(strtolower($newTitle));
            $album->save();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slide = Slide::findOrfail($id);

        $slide->status = false;

        $slide->save();

        // $slide = update(['status' => false]);
        // $ruta = storage_path() .'/app/public/images/slides/'. $slide->name_image;

        // if(File::exists($ruta))
        // {
        //     File::delete($ruta);
        // }

        // $slide->delete();
        // return redirect()->route('slides.index')->with('success', 'Slide eliminado exitosamente.');
    }

    public function deleteSlide(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $slide = Slide::findOrfail($id);
        //Modifico el status a false
        $slide->status = false;
        //Guardo
        $slide->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Slide eliminado.']);
    }

    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $slide = Slide::findOrFail($id);

        $slide->visible = $status;

        $slide->save();

        return response()->json(['message' => 'Slide eliminado.']);
    }
}
