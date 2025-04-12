<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use App\Models\About;
use App\Models\Album;
use App\Models\Blog;
use App\Models\Evento;
use App\Models\Index;
use App\Models\Message;
use App\Models\Service;
use App\Models\Category;
use App\Models\General;
use App\Models\Testimony;
use App\Models\ClientLogos;
use App\Models\Rotacion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\EmailConfig;
use App\Models\Story;
use App\Models\Subscriber;

class IndexController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
    $servicios = Service::where('status', '=', true)->where('visible', '=', true)->get();
    $titulos = Category::where('status', '=', true)->where('visible', '=', true)->get();
    $testimonios = Testimony::where('status', '=', true)->where('visible', '=', true)->get();
    $logos = ClientLogos::all();
    $generales = General::all()->first();
    $albumPerfil = Album::where('name', 'Perfil')->with('images')->first();
    $perfil = $albumPerfil ? $albumPerfil->images->first() : null;
    $albumPortada = Album::where('name', 'Portada')->with('images')->first();
    $imagenPortada = $albumPortada ? $albumPortada->images->first() : null;
    $videos = Story::latest()->get();
    $albumSlidersWhitImages = Album::where('name', 'Sliders')->with('images')->first();
    $albumSliders = $albumSlidersWhitImages->images;

    return view('public.index', compact('servicios', 'titulos', 'generales', 'testimonios', 'logos', 'perfil', 'imagenPortada', 'videos', 'albumSliders'));
  }

  public function servicios(Request $request)
  {
    $generales = General::all()->first();

    // Inicializa la consulta de servicios
    $query = Service::where('status', '=', true)->where('visible', '=', true);

    // Verifica si se proporciona un slug en la request
    if ($request->has('slug')) {
      $slug = $request->input('slug');
      // Filtra los servicios por slug
      $query->where('slug', '=', $slug);
    }

    // Obtiene el primer servicio (o null si no hay coincidencias)
    $servicio = $query->first();

    // Si no se encuentra el servicio, puedes redirigir o mostrar un mensaje de error
    if (!$servicio) {
      return redirect()->back()->with('error', 'Servicio no encontrado.');
      // O también puedes retornar una vista específica para errores 404
      // return abort(404);
    }

    $modificarTextServicio = ucfirst(strtolower($servicio->title));
    $servicioAlbum = Album::where('name', $modificarTextServicio)->first();

    if (!$servicioAlbum) {
      return redirect()->back()->with('error', 'El álbum no existe.');
    }

    $servicioGaleria = $servicioAlbum->images;

    // Obtiene todos los servicios (sin filtro de slug) para mostrarlos en la vista
    $servicios = Service::where('status', '=', true)->where('visible', '=', true)->get();
    $albumPerfil = Album::where('name', 'Perfil')->with('images')->first();
    $perfil = $albumPerfil ? $albumPerfil->images->first() : null;

    // Buscar el álbum "certificados"
    $albumGaleria = Album::where('name', 'Galeria')->first();

    // Si el álbum no existe, manejar el caso
    if (!$albumGaleria) {
      return redirect()->back()->with('error', 'El álbum "galeria" no existe.');
    }

    // Obtener las imágenes del álbum
    $imagesGaleria = $albumGaleria->images;

    return view('public.servicios', compact('generales', 'servicios', 'servicio', 'perfil', 'servicioGaleria', 'imagesGaleria'));
  }
  public function detalle_servicio($id)
  {
    $servicio = Service::findOrFail($id);
    $modificarTextServicio = ucfirst(strtolower($servicio->title));
    $servicioAlbum = Album::where('name', $modificarTextServicio)->first();
    // Si el álbum no existe, manejar el caso
    // Si el álbum no existe, manejar el caso
    if (!$servicioAlbum) {
      return redirect()->back()->with('error', 'El álbum "certificados" no existe.');
    }
    // Obtener las imágenes del álbum

    // Obtener las imágenes del álbum y generar las URLs completas
    $servicioGaleria = $servicioAlbum->images->map(function ($image) {
      $image->url_image = asset($image->url_image);  // Generar la URL completa
      return $image;
    });
    return response()->json([
      'servicio' => $servicio,
      'galeria' => $servicioGaleria,
    ]); // Devuelve los detalles en formato JSON

  }
  public function detalleServicio($id)
  {

    $servicioById = Service::where('id', '=', $id)->first();
    $servicios = Service::where('status', '=', true)->where('visible', '=', true)->get();
    $generales = General::all()->first();
    return view('public.servicios', compact('generales', 'servicios', 'servicioById'));
  }
  public function blogs(Request $request)
  {
    // Obtener el post más reciente
    $latestPost = Blog::latest()->first();

    // Obtener los 3 posts siguientes
    $otherPosts = Blog::where('id', '!=', $latestPost->id)
      ->latest()
      ->take(3)
      ->get();

    // Obtener todos los posts restantes
    $allPosts = Blog::where('id', '!=', $latestPost->id)
      ->latest()
      ->paginate(12);
    $generales = General::all()->first();

    $categoriaId = $request->get('categoria_id', null);

    // Obtener posts por categoría (si se selecciona)
    $query = Blog::query();

    if ($categoriaId && $categoriaId != "todos") {
      $query->where('category_id', $categoriaId);
    }


    $posts = $query->paginate(12); // Cambia 10 

    if ($request->ajax()) {

      return view('public.filtro_posts', compact('posts'))->render();
    }

    $allCategorias = Category::all();
    return view('public.blogs', compact('generales', 'latestPost', 'otherPosts', 'allPosts', 'allCategorias'));
  }
  public function filter_posts(Request $request)
  {
    $categoriaId = $request->get('categoria_id', null);


    // Obtener posts por categoría (si se selecciona)
    $query = Blog::query();
    if ($categoriaId) {
      $query->where('categoria_id', $categoriaId);
    }

    $posts = $query->paginate(10); // Cambia 10 


    if ($request->ajax()) {

      return view('public.filtro_posts', compact('posts'))->render();
    }

    // Si no es AJAX, redirige o devuelve algo más (opcional)
    return response()->json(['error' => 'Solicitud no válida'], 400);
  }

  public function detalle_post($slug)
  {
    $post = Blog::where('slug', $slug)->first();
    $otherPosts = Blog::where('slug', '!=', $slug)
      ->latest()
      ->take(3)
      ->get();
    $generales = General::all()->first();
    if (!$post) {
      return redirect()->route('blogs')->with('error', 'Post no encontrado.');
    }
    $url = url("/blogs/post/{$slug}");
    $title = $post->title;
    return view('public.post', compact('generales', 'post', 'otherPosts', 'url', 'title'));
  }


  public function nosotros()
  {
    $allServicios = Service::where('status', '=', true)->where('visible', '=', true)->get();
    $generales = General::all()->first();
    $about = About::all()->first();
    /*obtener imagenes de certificados*/
    // Buscar el álbum "certificados"
    $albumCertificado = Album::where('name', 'Certificados')->first();
    $allEventos = Evento::where('status', '=', true)->where('visible', '=', true)->get();
    // Si el álbum no existe, manejar el caso
    if (!$albumCertificado) {
      return redirect()->back()->with('error', 'El álbum "certificados" no existe.');
    }

    // Obtener las imágenes del álbum
    $imagesCertificados = $albumCertificado->images;

    // Buscar el álbum "certificados"
    $albumGaleria = Album::where('name', 'Galeria')->first();

    // Si el álbum no existe, manejar el caso
    if (!$albumGaleria) {
      return redirect()->back()->with('error', 'El álbum "galeria" no existe.');
    }

    // Obtener las imágenes del álbum
    $imagesGaleria = $albumGaleria->images;

    $albumPerfil = Album::where('name', 'Perfil')->with('images')->first();
    $perfil = $albumPerfil ? $albumPerfil->images->first() : null;
    $albumPortada = Album::where('name', 'Portada')->with('images')->first();
    $imagenPortada = $albumPortada ? $albumPortada->images->first() : null;

    $allRotaciones = Rotacion::where('status', '=', true)->where('visible', '=', true)->get();

    return view('public.nosotros', compact('generales', 'about', 'allServicios', 'allEventos', 'imagesCertificados', 'albumGaleria', 'imagesGaleria', 'perfil', 'imagenPortada', 'allRotaciones'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreIndexRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Index $index)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Index $index)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateIndexRequest $request, Index $index)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Index $index)
  {
    //
  }
  public function guardarSubscriptor(Request $request)
  {


    $request->validate([
      'email' => 'required|email|unique:subscribers',
    ]);

    Subscriber::create([
      'email' => $request->email,
    ]);

    return response()->json(['message' => 'Suscripción realizada con éxito']);
  }

  /**
   * Save contact from blade
   */
  public function guardarContacto(Request $request)
  {
    //Del modelo
    //'full_name', 'email', 'phone', 'message', 'status', 'is_read'
    $data = $request->all();
    $data['full_name'] = $request->name . ' ' . $request->last_name;

    try {
      $reglasValidacion = [
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:99999999999',
        'message' => 'required|string|max:255',
      ];
      $mensajes = [
        'name.required' => 'El campo nombre es obligatorio.',
        'last_name.required' => 'El campo apellido es obligatorio.',
        'email.required' => 'El campo correo electrónico es obligatorio.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
        'phone.required' => 'El campo teléfono es obligatorio.',
        'phone.integer' => 'El campo teléfono debe ser un número entero.',
        'address.required' => 'El campo dirección es obligatorio.',
        'message.required' => 'El campo mensaje es obligatorio.',
      ];
      $request->validate($reglasValidacion, $mensajes);
      $formlanding = Message::create($data);
      $this->envioCorreo($formlanding);
      $this->envioCorreoInterno($formlanding);
      // return redirect()->route('landingaplicativos', $formlanding)->with('mensaje','Mensaje enviado exitoso')->with('name', $request->nombre);
      return response()->json(['message' => 'Mensaje enviado con exito']);
    } catch (ValidationException $e) {
      return response()->json(['message' => $e->validator->errors()], 400);
    }
  }

  private function envioCorreo($data)
  {
    $name = $data['full_name'];
    $mail = EmailConfig::config($name);
    $generales = General::all()->first();
    $instagram = $generales->instagram;

    try {
      $mail->addAddress($data['email']);
      $mail->Body =
        '
            <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mundo web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <main>
      <table
        style="
          width: 600px;
          margin: 0 auto;
          text-align: center;
          background-image: url(https://cirugiasdelima.com/mail/FondoMailing.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        "
      >
        <thead>
          <tr>
            <th
              style="
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                margin: 40px;
              "
            >
              <img
                src="https://cirugiasdelima.com/mail/logo.png"
                alt="kewin"
              />
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-weight: 500;
                  font-size: 18px;
                  text-align: center;
                  width: 500px;
                  margin: 0 auto;
                  padding: 20px 0;
                  font-family: Montserrat, sans-serif;
                "
              >
                <span style="display: block">Hola </span>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-size: 40px;
                  line-height: 20px;
                  font-family: Montserrat, sans-serif;
                "
              >
                <span style="display: block">' .
        $name .
        ' </span>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-size: 40px;
                  line-height: 70px;
                  font-family: Montserrat, sans-serif;
                  font-weight: bold;
                "
              >
                ¡Gracias
                <span style="color: #ffffff">por escribirnos!</span>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p
                style="
                  color: #ffffff;
                  font-weight: 500;
                  font-size: 18px;
                  text-align: center;
                  width: 500px;
                  margin: 0 auto;
                  padding: 20px 0;
                  font-family: Montserrat, sans-serif;
                "
              >
                En breve estaremos comunicandonos contigo.
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <a
                target="_blank"
                href="https://cirugiasdelima.com/"
                style="
                  text-decoration: none;
                  background-color: #fdfefd;
                  color: #254f9a;
                  padding: 16px 20px;
                  display: inline-flex;
                  justify-content: center;
                  border-radius: 10px;
                  align-items: center;
                  gap: 10px;
                  font-weight: 600;
                  font-family: Montserrat, sans-serif;
                  font-size: 16px;
                  margin-bottom:20px;
                "
              >
                <span>Visita nuestra web</span>
              </a>
            </td>
          </tr>

          <tr>
              <td style="padding: 10px 0">
              <a href="https://' .
        htmlspecialchars($generales->instagram, ENT_QUOTES, 'UTF-8') .
        '" target="_blank"><img src="https://cirugiasdelima.com/mail/instagram0.png" alt="instagram" /></a>
              <a href="https://' .
        htmlspecialchars($generales->facebook, ENT_QUOTES, 'UTF-8') .
        '" target="_blank"><img src="https://cirugiasdelima.com/mail/facebook0.png" alt="facebook" /></a>
              <a href="https://' .
        htmlspecialchars($generales->linkedin, ENT_QUOTES, 'UTF-8') .
        '" target="_blank"><img src="https://cirugiasdelima.com/mail/linkedin0.png" alt="linkedin" /></a>
              <a href="https://' .
        htmlspecialchars($generales->tiktok, ENT_QUOTES, 'UTF-8') .
        '" target="_blank"><img src="https://cirugiasdelima.com/mail/tiktok0.png" alt="linkedin" /></a>
              <a href="https://api.whatsapp.com/send?phone=' .
        htmlspecialchars($generales->whatsapp, ENT_QUOTES, 'UTF-8') .
        '&text=' .
        htmlspecialchars($generales->mensaje_whatsapp, ENT_QUOTES, 'UTF-8') .
        '" target="_blank"><img src="https://cirugiasdelima.com/mail/whatsapp_1.png" alt="whatsapp" /></a>
              </td>
          </tr>
          <tr>
              <td style="text-align: right; padding-right: 80px">
                  <img src="https://cirugiasdelima.com/mail/banner.png" alt="mundo web" style="width: 80%" />
              </td>
          </tr>
</tbody>
</table>
</main>
</body>

</html>
';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }







  private function envioCorreoInterno($data)
  {
    $name = $data['full_name'];
    $mail = EmailConfig::config($name);
    $emailCliente = General::all()->first();

    try {
      $mail->addAddress($emailCliente->email);
      $mail->Body =
        '
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mundo web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    </style>
</head>

<body>
    <main>
        <table style="
                        width: 600px;
                        margin: 0 auto;
                        text-align: center;
                        background-image: url(https://cirugiasdelima.com/mail/FondoMailing.png);
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                      ">
            <thead>
                <tr>
                    <th style="
                              display: flex;
                              flex-direction: row;
                              justify-content: center;
                              align-items: center;
                              margin: 40px;
                            ">
                        <img src="https://cirugiasdelima.com/mail/logo.png" alt="kewin" />
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p style="
                                color: #ffffff;
                                font-weight: 500;
                                font-size: 18px;
                                text-align: center;
                                width: 500px;
                                margin: 0 auto;
                                padding: 20px 0;
                                font-family: Montserrat, sans-serif;
                              ">
                            <span style="display: block">Hola Dr. Kewin</span>
                            <span style="display: block">Tienes un nuevo mensaje de:</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="
                                color: #ffffff;
                                font-size: 40px;
                                line-height: 20px;
                                font-family: Montserrat, sans-serif;

                                margin: 30px 0;
                              ">
                            <span style="display: block">' .
        $name .
        ' </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a target="_blank" href="https://cirugiasdelima.com/" style="
                                text-decoration: none;
                                background-color: #fdfefd;
                                color: #254f9a;
                                padding: 16px 20px;
                                display: inline-flex;
                                justify-content: center;
                                border-radius: 10px;
                                align-items: center;
                                gap: 10px;
                                font-weight: 600;
                                font-family: Montserrat, sans-serif;
                                font-size: 16px;
                              ">
                            <span>Visita nuestra web</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 80px">
                        <img src="https://cirugiasdelima.com/mail/banner.png" alt="mundo web" style="width: 80%" />
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>

';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
