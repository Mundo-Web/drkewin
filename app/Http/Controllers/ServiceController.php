<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Album;
use App\Models\ClientLogos;
use App\Models\General;
use App\Models\Service;
use Illuminate\Http\Request;

//use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
//use Illuminate\Support\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    $servicios = Service::where('status', '=', true)->get();

    return view('pages.service.index', compact('servicios'));
  }

  public function mostrarFront()
  {
    $servicios = Service::where('status', '=', true)->get();
    $logos = ClientLogos::where('status', '=', true)->get();
    $generales = General::where('id', '=', 1)->get();
    return view('public.index', compact('servicios', 'logos', 'generales'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('pages.service.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    // Paso 1: Validación de la solicitud
    $request->validate([
      'title' => 'required|string|max:255',
      'imagen' => 'required|image', // Validación para el SVG
    ]);

    // Paso 2: Crear y guardar el servicio (si hay imagen SVG)
    $service = new Service();

    try {
      // Si la solicitud tiene un archivo de imagen
      if ($request->hasFile('imagen')) {
        // Obtener el archivo SVG
        $file = $request->file('imagen');
        $routeImg = 'storage/images/svgs/';
        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

        // Guardar el archivo SVG

        $this->saveImg($file, $routeImg, $nombreImagen);

        // Establecer la URL de la imagen SVG
        $service->url_image = $routeImg . $nombreImagen;
      }

      // Guardar el resto de los datos del servicio
      $service->link = $request->link;
      $service->title = $request->title;
      $service->description = $request->description;
      $service->process = $request->process;
      $service->extracto = $request->extracto;
      $service->slug = Str::slug($request->title);

      // Beneficios (puedes agregar más si es necesario)
      $service->name_beneficio1 = $request->name_beneficio1;
      $service->description_beneficio1 = $request->description_beneficio1;
      $service->name_beneficio2 = $request->name_beneficio2;
      $service->description_beneficio2 = $request->description_beneficio2;
      $service->name_beneficio3 = $request->name_beneficio3;
      $service->description_beneficio3 = $request->description_beneficio3;
      $service->name_beneficio4 = $request->name_beneficio4;
      $service->description_beneficio4 = $request->description_beneficio4;

      // Estado y visibilidad
      $service->status = 1; // Por ejemplo, activo
      $service->visible = 1; // Visible

      // Guardar el servicio
      $service->save();

      // Paso 3: Crear la carpeta principal "Especialidades" si no existe
      $especialidadesAlbum = Album::firstOrCreate([
        'name' => 'Especialidades',
      ], [
        'description' => 'Contenedor principal para las especialidades.',
      ]);


      // Paso 4: Crear la carpeta principal en el sistema de archivos si no existe
      $mainFolder = 'Especialidades';
      $pathMainFolder = public_path('storage/images/albums/' . $mainFolder);
      if (!is_dir($pathMainFolder)) {
        mkdir($pathMainFolder, 0777, true); // Crear la carpeta principal
      };
      // Paso 5: Crear la subcarpeta con el nombre de la especialidad (por ejemplo "Problemas de Cirugías")
      $subFolder = $request->title;
      $pathSubFolder = $pathMainFolder . '/' . $subFolder;
      if (!is_dir($pathSubFolder)) {
        mkdir($pathSubFolder, 0777, true); // Crear la subcarpeta
      }

      // Paso 6: Crear el álbum de la especialidad y asociarlo con la carpeta principal

      $album = Album::updateOrCreate([
        'name' => ucfirst(strtolower($request->title)), // Primer palabra en mayúscula
      ], [
        'parent_id' => $especialidadesAlbum->id, // Asociar como hijo de "Especialidades"
      ]);

      // Paso 7: Redirigir con mensaje de éxito
      return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');
    } catch (\Throwable $th) {
      // Paso 8: Manejo de excepciones

      return response()->json(['message' => 'Error al procesar la solicitud. ' . $th->getMessage()], 400);
    }
  }

  public function storeJordan(Request $request)
  {

    $request->validate([
      'title' => 'required',
      'imagen' => 'required|image|mimes:svg|',
    ]);

    //tamaño imagenes 808x445
    $service = new Service();

    try {
      if ($request->hasFile('imagen')) {
        $file = $request->file('imagen');
        $routeImg = 'storage/images/svgs/';
        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
        $this->saveImg($file, $routeImg, $nombreImagen);
        $service->url_image = $routeImg . $nombreImagen;
        // $service->name_image = $nombreImagen;
      }
      $service->link = $request->link;
      $service->title = $request->title;
      /* $service->description = $request->description; */
      $service->description = $request->description;

      $service->extracto = $request->extracto;


      /* beneficio */
      $service->name_beneficio1 = $request->name_beneficio1;
      $service->description_beneficio1 = $request->description_beneficio1;
      $service->name_beneficio2 = $request->name_beneficio2;
      $service->description_beneficio2 = $request->description_beneficio2;
      $service->name_beneficio3 = $request->name_beneficio3;
      $service->description_beneficio3 = $request->description_beneficio3;
      $service->name_beneficio4 = $request->name_beneficio4;
      $service->description_beneficio4 = $request->description_beneficio4;


      /*  */
      $service->status = 1;
      $service->visible = 1;

      $service->save();
      //Buscar el álbum "Especialidades" o crearlo si no existe
      $especialidadesAlbum = Album::firstOrCreate([
        'name' => 'Especialidades',
      ], [
        'description' => 'Contenedor principal para las especialidades.',
      ]);
      // Crear la carpeta principal "Especialidades" si no existe
      $mainFolder = 'Especialidades';
      $pathMainFolder = storage_path('app/public/images/albums/' . $mainFolder);
      if (!is_dir($pathMainFolder)) {
        mkdir($pathMainFolder, 0777, true); // Crear la carpeta principal
      }

      // Crear la subcarpeta con el nombre de la especialidad (por ejemplo "Problemas de Cirugías")
      $subFolder = $request->name;
      $pathSubFolder = $pathMainFolder . '/' . $subFolder;
      if (!is_dir($pathSubFolder)) {
        mkdir($pathSubFolder, 0777, true); // Crear la subcarpeta
      }
      // Crear el álbum (subcarpeta) de la especialidad
      $album = Album::create([
        'name' => ucfirst(strtolower($request->title)),
        // Asociar la especialidad con la carpeta principal (Especialidades)
        'parent_id' => $especialidadesAlbum->id,
      ]);

      return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');
    } catch (\Throwable $th) {
      return response()->json(['messge' => 'Verifique sus datos ' . $th], 400);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Service $service)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Service $service, $id)
  {
    $servicios = Service::find($id);

    return view('pages.service.edit', compact('servicios'));
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
    $service = Service::findOrfail($id);

    // Guardar el título anterior para actualizar el álbum y la carpeta
    $oldTitle = $service->title;

    $service->title = $request->title;
    $service->description = $request->description;
    $service->process = $request->process;
    $service->extracto = $request->extracto;

    try {

      if ($request->hasFile("imagen")) {
        $file = $request->file('imagen');
        $routeImg = 'storage/images/imagen/';
        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();

        $this->saveImg($file, $routeImg, $nombreImagen);

        $service->url_image = $routeImg . $nombreImagen;
        // $service->name_image = $nombreImagen;
      }


      $service->link = $request->link;
      $service->title = $request->title;
      $service->description = $request->description;
      $service->extracto = $request->extracto;

      /* beneficios */
      $service->name_beneficio1 = $request->name_beneficio1;
      $service->description_beneficio1 = $request->description_beneficio1;
      $service->name_beneficio2 = $request->name_beneficio2;
      $service->description_beneficio2 = $request->description_beneficio2;
      $service->name_beneficio3 = $request->name_beneficio3;
      $service->description_beneficio3 = $request->description_beneficio3;
      $service->name_beneficio4 = $request->name_beneficio4;
      $service->description_beneficio4 = $request->description_beneficio4;


      /*  */
      $service->save();
      // Actualizar el álbum y la carpeta en el sistema de archivos
      $this->updateAlbumAndFolder($oldTitle, $service->title);

      return redirect()->route('servicios.index')->with('success', 'Servicio actualizado exitosamente.');
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
    $service = Service::findOrfail($id);

    $service->status = false;

    $service->save();

    // $service = update(['status' => false]);
    // $ruta = storage_path() .'/app/public/images/servicios/'. $service->name_image;

    // if(File::exists($ruta))
    // {
    //     File::delete($ruta);
    // }

    // $service->delete();
    // return redirect()->route('servicios.index')->with('success', 'Servicio eliminado exitosamente.');
  }

  public function deleteService(Request $request)
  {
    //Recupero el id mandado mediante ajax
    $id = $request->id;
    //Busco el servicio con id como parametro
    $service = Service::findOrfail($id);
    //Modifico el status a false
    $service->status = false;
    //Guardo
    $service->save();

    // Devuelvo una respuesta JSON u otra respuesta según necesites
    return response()->json(['message' => 'Servicio eliminado.']);
  }

  public function updateVisible(Request $request)
  {
    // Lógica para manejar la solicitud AJAX
    //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
    $id = $request->id;

    $field = $request->field;

    $status = $request->status;

    $service = Service::findOrFail($id);

    $service->visible = $status;

    $service->save();

    return response()->json(['message' => 'Servicio eliminado.']);
  }
}
