<?php

namespace App\Jobs;

use App\Models\Album;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class ProcessAlbumImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Album $album,
        public array $temporaryFiles,
        public string $tempFolder
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $manager = new ImageManager(new Driver());
        $basePath = 'images/albums/' . $this->album->id . '/';
        $fullPath = storage_path('app/public/' . $basePath);

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        foreach ($this->temporaryFiles as $tempFile) {
            try {
                $filePath = $this->tempFolder . '/' . $tempFile;
                $fileName = Str::uuid() . '.' . pathinfo($tempFile, PATHINFO_EXTENSION);

                $image = $manager->read(storage_path('app/' . $filePath));
                $image->save($fullPath . $fileName);

                $this->album->images()->create([
                    'url_image' => 'storage/' . $basePath . $fileName,
                    'name_image' => $fileName,
                ]);

                // Eliminar archivo temporal
                File::delete(storage_path('app/' . $filePath));
            } catch (\Exception $e) {
                Log::error("Error procesando imagen $tempFile: " . $e->getMessage());
            }
        }

        // Eliminar carpeta temporal si está vacía
        if (count(File::files(storage_path('app/' . $this->tempFolder))) === 0) {
            File::deleteDirectory(storage_path('app/' . $this->tempFolder));
        }
    }
}
