<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'fecha', 'hora', 'hora_final', 'lugar', 'modalidad', 'link', 'visible', 'status'];
    protected $casts = [
        'modalidad' => 'string', // O usar enum si soporta PHP >= 8.1
    ];

    // Opcional: Método para validar modalidades permitidas
    public static function modalidadesPermitidas()
    {
        return ['presencial', 'virtual', 'ambos'];
    }
}
