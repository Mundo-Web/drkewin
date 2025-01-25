<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Event;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('pages.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos ingresados
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'lugar' => 'required|string|max:255',
            'modalidad' => 'required|in:Presencial,Virtual,Presencial y Virtual',
            'link' => 'nullable|url', // El link es opcional pero debe ser una URL válida
        ]);

        // Crear un nuevo evento
        Evento::create([
            'nombre' => $validatedData['nombre'],
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'lugar' => $validatedData['lugar'],
            'modalidad' => $validatedData['modalidad'],
            'link' => $validatedData['link'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('pages.eventos.edit', compact('evento',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Normalizar el campo "hora" al formato H:i
        if ($request->has('hora')) {
            $request->merge(['hora' => date('H:i', strtotime($request->hora))]);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'lugar' => 'required|string|max:255',
            'modalidad' => 'required|in:Presencial,Virtual,Presencial y Virtual',
            'link' => 'nullable|url',
        ]);
        $evento = Evento::find($id);
        // Actualizar los datos del evento
        $evento->update([
            'nombre' => $validatedData['nombre'],
            'fecha' => $validatedData['fecha'],
            'hora' => $validatedData['hora'],
            'lugar' => $validatedData['lugar'],
            'modalidad' => $validatedData['modalidad'],
            'link' => $validatedData['link'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
    public function deleteEvento(Request $request)
    {
        //Recupero el id mandado mediante ajax
        $id = $request->id;
        //Busco el servicio con id como parametro
        $evento = Evento::findOrfail($id);
        //Modifico el status a false
        $evento->status = false;
        //Guardo
        $evento->save();

        // Devuelvo una respuesta JSON u otra respuesta según necesites
        return response()->json(['message' => 'Post eliminado.']);
    }



    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        $evento = Evento::findOrFail($id);

        $evento->$field = $status;

        $evento->save();

        return response()->json(['message' => 'Actualizado el Registro.']);
    }
}
