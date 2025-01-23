<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\ImageManager;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::all();
       
        return view('pages.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $categories = Category::all();
       
        return view('pages.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'extracto'=>'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png,jpg|max:2048',
        ]);


        if ($request->hasFile('image')) {


            $manager = new ImageManager(new Driver());

            $nombreImagen = Str::random(10) . '_' . $request->file('image')->getClientOriginalName();

            $img = $manager->read($request->file('image'));

            // Ajustar el tamaño de la imagen si es necesario
            $width = 808;
            $height = 445;
            $img->resize($width, $height);

            // Ruta para guardar las imágenes en el almacenamiento público
            $ruta = 'storage/images/posts/';

            // Crear la carpeta si no existe
            if (!is_dir(public_path($ruta))) {
                mkdir(public_path($ruta), 0777, true);
            }

            // Guardar la imagen en la carpeta
            $img->save(public_path($ruta . $nombreImagen));

            // Guardar en la base de datos
            Blog::create([
                'slug'=>Str::slug($request->title),
                'extracto'=>$request->extracto,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'visible' => 1,
                'url_image' => $ruta . $nombreImagen,
            ]);

            return redirect()->route('blog.index')->with('success', 'Post creado correctamente.');
        }

        return back()->with('error', 'No se pudo subir la imagen.');



        /* $request->validate([
             'title'=>'required',
         ]);
         $post = new Blog();
         if($request->hasFile("imagen")){
             $manager = new ImageManager(new Driver());
             $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();
             $img =  $manager->read($request->file('imagen'));
             //seteamos el tamaño de que deben de tener las imagenes que se suban
              $qwidth = 808;
              $qheight = 445;
             // Obtener las dimensiones de la imagen que se esta subiendo
             $width = $img->width();
             $height = $img->height();
             if($width > $height){
                 //dd('Horizontal');
                 //si es horizontal igualamos el alto de la imagen a alto que queremos
                 $img->resize(height: 445)->crop(808, 445);

             }else{
                 //dd('Vertical');
                 //En caso sea vertical la imagen
                 //gualamos el ancho y cropeamos
                 $img->resize(width: 808)->crop(808, 445);
            }
           //  $ruta = storage_path() . '/app/public/images/posts/';
             //modificado para mejor rendimiento
             $ruta= Storage::url('images/posts/' .$nombreImagen);
             //$img->save($ruta.$nombreImagen);
             $post->url_image = $ruta;
             $post->name_image = $nombreImagen;
         }else{
             return response()->json(['message'=>'La imagen ingresada no es valida']);
         }

         $post->category_id = $request->category_id;
         $post->title = $request->title;
         $post->description = $request->description;
         $post->status = 1;
         $post->visible = 1;



         $post->save();

         return redirect()->route('blog.index')->with('success', 'Publicación creado exitosamente.');
     */
       }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(Blog $blog, $id)
   
    public function edit(Blog $blog)
    {
         $categories = Category::all();
        
        return view('pages.blog.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'extracto'=>'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg|max:2048', // Imagen opcional
        ]);

        // Encontrar el post existente
        $post = Blog::find($request->id);

        // Almacenar información de la imagen actual
        $oldImagePath = $post->url_image;

        // Comprobar si se ha subido una nueva imagen
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $newImageName = Str::random(10) . '_' . $request->file('image')->getClientOriginalName();
            $img = $manager->read($request->file('image'));

            // Ajustar el tamaño de la imagen
            $width = 808;
            $height = 445;
            $img->resize($width, $height);

            // Ruta pública para guardar la nueva imagen
            $newImagePath = 'storage/images/posts/';

            // Crear la carpeta si no existe
            if (!is_dir(public_path($newImagePath))) {
                mkdir(public_path($newImagePath), 0777, true);
            }

            // Guardar la nueva imagen
            $img->save(public_path($newImagePath . $newImageName));

            // Eliminar la imagen anterior si existía
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }

            // Actualizar la URL de la imagen en la base de datos
            $post->url_image = $newImagePath . $newImageName;
        }

        // Actualizar los demás campos
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug=Str::slug($request->title);
        $post->extracto = $request->extracto;
        // Guardar los cambios en la base de datos
        $post->save();

        return redirect()->route('blog.index')->with('success', 'Post actualizado correctamente.');
        /*
        $old_name = Blog::find($request->id)->name_image;
        
        $post = Blog::find($request->id);

        
        if($request->hasFile("imagen")){
           
            $manager = new ImageManager(new Driver());

            
            $ruta = storage_path() .'/app/public/images/posts/'. $old_name; 
           
            // dd($ruta);
            if(File::exists($ruta))
            {
                File::delete($ruta);
            }

            $rutanueva = storage_path() . '/app/public/images/posts/'; 
            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();

            $img =  $manager->read($request->file('imagen'));

            $width = $img->width();
            $height = $img->height();

            $qwidth = 808;
            $qheight = 445;

            if($width > $height){
                //dd('Horizontal');
                //si es horizontal igualamos el alto de la imagen a alto que queremos
                $img->resize(height: 445)->crop(808, 445);

            }else{
                //dd('Vertical');
                //En caso sea vertical la imagen
                //igualamos el ancho y cropeamos
                $img->resize(width: 808)->crop(808, 445);
            }

     
            $img->save($rutanueva.$nombreImagen);

           
            $post->url_image = $rutanueva;
            $post->name_image = $nombreImagen;
            
            
        }

            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->description = $request->description;

            
            $post->update();

            return redirect()->route('blog.index')->with('success', 'Post actualizado');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }


    public function deleteBlog(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $service = Blog::findOrfail($id); 
        //Modifico el status a false
        $service->status = false;
        //Guardo 
        $service->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Post eliminado.']);
    }



       public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $service = Blog::findOrFail($id);
        
        $service->$field = $status;

        $service->save();

         return response()->json(['message' => 'Servicio eliminado.']);
    
    }


}
