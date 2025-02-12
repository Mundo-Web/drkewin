<?php

namespace App\Http\Controllers;

use App\Models\Story;

use Illuminate\Http\Request;
use SoDe\Extend\Text;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Story::all();
        return view('pages.stories.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'youtube_url' => 'required|url', // Asegúrate de que la URL sea válida
        ]);

        // Extraer la UID de YouTube
        $data['uid'] = Text::getYTVideoId($request->youtube_url);

        // Validar que se haya obtenido un ID válido
        if (!$data['uid']) {
            return redirect()->back()->withErrors(['youtube_url' => 'La URL de YouTube no es válida o no se pudo extraer el ID.']);
        }

        // Guardar los datos en la base de datos
        Story::create($data);

        // Redirigir con un mensaje de éxito
        return redirect()->route('videos.index')->with('success', 'Evento creado con éxito.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }
    public function deleteVideo(Request $request)
    {
        dump('hasta aqui');
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $story = Story::findOrfail($id);

        $story->delete();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Video eliminado.']);
    }
}
