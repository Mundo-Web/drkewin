<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LogosClientController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\RotacionController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscriberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Las rutas publicas */

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/nosotros', [IndexController::class, 'nosotros'])->name('nosotros');
Route::get('/servicios', [IndexController::class, 'servicios'])->name('servicios');
Route::get('/servicio/{id}', [IndexController::class, 'detalle_servicio'])->name('detalle-servicios');

Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
//Route::get('/post/{id}', [IndexController::class, 'post'] )->name('post');
Route::get('/blogs/post/{slug}', [IndexController::class, 'detalle_post'])->name('detalle-post');
Route::get('/filtro', [IndexController::class, 'filter_posts'])->name('blogs-filtros');
//Route::get('/servicios/{id}', [IndexController::class, 'servicios'] )->name('servicios');



Route::post('guardarContactos', [IndexController::class, 'guardarContacto'])->name('guardarContactos');
Route::post('/guardar-subscriptor', [IndexController::class, 'guardarSubscriptor'])->name('guardarSubscriptor');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('analytics');
        Route::get('/dashboard/fintech', [DashboardController::class, 'fintech'])->name('fintech');

        //messages 
        Route::resource('/mensajes', MessageController::class);
        Route::post('/mensajes/borrar', [MessageController::class, 'borrar'])->name('mensajes.borrar');

        //subscriptores 
        Route::resource('/subscriptores', SubscriberController::class);
        Route::post('/subscriptores/borrar', [SubscriberController::class, 'borrar'])->name('subscriptores.borrar');




        //Datos Generales
        Route::resource('/datosgenerales', GeneralController::class);

        //Testimonies
        Route::resource('/testimonios', TestimonyController::class);
        Route::post('/testimonios/deleteTestimony', [TestimonyController::class, 'deleteTestimony'])->name('testimonios.deleteTestimony');
        Route::post('/testimonios/updateVisible', [TestimonyController::class, 'updateVisible'])->name('testimonios.updateVisible');

        //Categorías
        Route::resource('/categorias', CategoryController::class);
        Route::post('/categorias/deleteCategory', [CategoryController::class, 'deleteCategory'])->name('categorias.deleteCategory');
        Route::post('/categorias/updateVisible', [CategoryController::class, 'updateVisible'])->name('categorias.updateVisible');


        //Servicios
        Route::resource('/servicios', ServiceController::class);
        Route::post('/servicios/deleteService', [ServiceController::class, 'deleteService'])->name('servicio.deleteService');
        Route::post('/servicios/updateVisible', [ServiceController::class, 'updateVisible'])->name('servicio.updateVisible');


        //Blog
        Route::resource('/blog', BlogController::class);
        Route::post('/blog/deleteBlog', [BlogController::class, 'deleteBlog'])->name('blog.deleteBlog');
        Route::post('/blog/updateVisible', [BlogController::class, 'updateVisible'])->name('blog.updateVisible');

        //Crud Logos
        Route::resource('/logos', LogosClientController::class);
        Route::post('/logos/deleteLogo', [LogosClientController::class, 'deleteLogo'])->name('logos.deleteLogo');

        Route::resource('/staff', StaffController::class);
        Route::post('/staff/updateVisible', [StaffController::class, 'updateVisible'])->name('staff.updateVisible');

        //Crud Album Imagenes
        Route::resource('/albums', AlbumController::class);
        Route::post('/albums/{album}/upload', [AlbumController::class, 'uploadImages'])->name('albums.upload'); // Subir imágenes
        Route::delete('/albums/images/{image}', [AlbumController::class, 'destroyImage'])->name('albums.images.destroy');

        //Crud Eventos
        Route::resource('/eventos', EventoController::class);
        Route::post('/eventos/deleteEvento', [EventoController::class, 'deleteEvento'])->name('eventos.deleteEvento');
        Route::post('/eventos/updateVisible', [EventoController::class, 'updateVisible'])->name('eventos.updateVisible');

        //Datos About
        Route::resource('/about', AboutController::class);

        //Crud Rotaciones
        Route::resource('/rotaciones', RotacionController::class);
        Route::post('/rotaciones/deleteRotacion', [RotacionController::class, 'deleteRotacion'])->name('rotaciones.deleteRotacion');
        Route::post('/rotaciones/updateVisible', [RotacionController::class, 'updateVisible'])->name('rotaciones.updateVisible');
        //Crud videos
        Route::resource('/videos', StoryController::class);
        Route::post('/videos/deleteVideo', [StoryController::class, 'deleteVideo'])->name('videos.deleteVideo');

        //t

        Route::fallback(function () {
            return view('pages/utility/404');
        });
    });
});
