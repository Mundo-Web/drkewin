<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id'];

    // Relación con álbum padre
    public function parent()
    {
        return $this->belongsTo(Album::class, 'parent_id');
    }

    // Relación con álbumes hijos
    public function children()
    {
        return $this->hasMany(Album::class, 'parent_id');
    }

    // Relación con las imágenes dentro del álbum
    public function images()
    {
        return $this->hasMany(AlbumImage::class);
    }
}
