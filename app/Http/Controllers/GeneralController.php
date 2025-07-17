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
            'twitter' => 'nullable',
            // Campos SEO
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:60',
            'og_description' => 'nullable|string|max:200',
            'og_image' => 'nullable|string',
            'canonical_url' => 'nullable|url',
            'structured_data' => 'nullable|string'
        ]);



        // Actualizar todos los campos del modelo
        $general->update($validatedData);



        return back()->with('success', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(General $general)
    {
        //Este es el proceso que borra
    }
}
