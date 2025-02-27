<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'url_image', 'name_image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
