<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneralRequest;
use App\Http\Requests\UpdateGeneralRequest;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //llames a los registros para mostrarlos en tabla


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //El formjulario para crear
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneralRequest $request)
    {
        //este es el proceso que crea
    }

    /**
     * Display the specified resource.
     */
    public function show(General $general)
    {
        //este es el que muestra
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(General $general)
    {
        //El que muestra el form para editar
        //return "mostrar el unico registro";

        $general = General::find(1);

        // if (!$general) {
        //     return redirect()->back()->with('error', 'El registro no existe');
        // }


        return view('pages.general.edit', compact('general'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $general = General::findOrFail($id);

        // Validación de campos
        $validatedData = $request->validate([
            'hero_video' => 'nullable|file|mimes:mp4,webm|max:20480',
            'title1' => 'required|string|max:255',
            'title2' => 'nullable|string|max:255',
            'description' => 'nullable',
            'address' => 'nullable',
            'inside' => 'nullable',
            'district' => 'nullable',
            'country' => 'nullable',
            'email' => 'nullable',
            'cellphone' => 'nullable',
            'office_phone' => 'nullable',
            'whatsapp' => 'nullable',
            'mensaje_whatsapp' => 'nullable',
            'schedule' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'linkedin' => 'nullable',
            'tiktok' => 'nullable',
            'twitter' => 'nullable'
        ]);

        try {
            DB::beginTransaction();

            // Manejar la subida del video
            if ($request->hasFile('hero_video')) {
                // Eliminar video anterior
                if ($general->hero_video_url) {
                    $oldPath = public_path($general->hero_video_url);
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                // Guardar nuevo video
                $video = $request->file('hero_video');
                $videoName = 'video_' . time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('storage/videos/hero'), $videoName);
                $ruta = 'storage/videos/hero';
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
                }
                $general->hero_video_url = 'storage/videos/hero/' . $videoName;
            }

            // Actualizar todos los campos del modelo
            $general->update($validatedData);

            DB::commit();

            return back()->with('success', 'Datos actualizados correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al actualizar: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(General $general)
    {
        //Este es el proceso que borra
    }
}
