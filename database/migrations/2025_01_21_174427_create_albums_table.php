<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nombre del álbum
            $table->string('description')->nullable(); // Descripción opcional
            $table->foreignId('parent_id')->nullable()->constrained('albums')->onDelete('cascade'); // Referencia al álbum padre
            $table->timestamps();
        });
        Schema::create('album_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained()->onDelete('cascade'); // Relación con álbum
            $table->string('url_image'); // Ruta de la imagen
            $table->string('name_image'); // Nombre de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
        Schema::dropIfExists('album_images');
    }
};
