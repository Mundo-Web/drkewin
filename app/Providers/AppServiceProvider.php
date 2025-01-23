<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('components.app.sidebar', function ($view) {
            // Obtener los datos del footer
            $mensajes = Message::where('is_read', '!=', 1)->where('status', '!=', 0)->count(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            // Pasar los datos a la vista
            $view->with('mensajes', $mensajes);

            // Obtener los datos del footer
            $subscriptores = Subscriber::where('status', '!=', 0)->count(); // Suponiendo que tienes un modelo Footer y un método footerData() en él
            // Pasar los datos a la vista
            $view->with('subscriptores', $subscriptores);
        });
    }
}
