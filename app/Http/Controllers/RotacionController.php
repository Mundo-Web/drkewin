<?php

namespace App\Http\Controllers;

use App\Models\Rotacion;
use Illuminate\Http\Request;

class RotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rotaciones = Rotacion::all();
        return view('pages.rotacion.index', compact('rotaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.rotacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
        
        // Validar los datos ingresados
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);
    

        // Crear un nuevo evento
        Rotacion::create([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
         
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('rotaciones.index')->with('success', 'Evento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rotacion $rotacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $rotacion = Rotacion::findOrFail($id);
   
    return view('pages.rotacion.edit', compact('rotacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
               'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            ]);
        $rotacion = Rotacion::findOrFail($id);
        // Actualizar los datos 
        $rotacion->update([
            'titulo' => $validatedData['titulo'],
            'descripcion' => $validatedData['descripcion'],
           
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('rotaciones.index')->with('success', 'Rotacion Medica actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotacion $rotacion)
    {
        //
    }

    public function deleteRotacion(Request $request)
  {
    //Recupero el id mandado mediante ajax
    $id = $request->id;
    //Busco el servicio con id como parametro
    $rotacion = Rotacion::findOrfail($id);
    //Modifico el status a false
    $rotacion->status = false;
    //Guardo
    $rotacion->save();

    // Devuelvo una respuesta JSON u otra respuesta según necesites
    return response()->json(['message' => 'Rotacion Medica eliminado.']);
  }

  public function updateVisible(Request $request)
  {
    // Lógica para manejar la solicitud AJAX
    //return response()->json(['mensaje' => 'Solicitud AJAX manejada con éxito']);
    $id = $request->id;

    $field = $request->field;

    $status = $request->status;

    $rotacion = Rotacion::findOrFail($id);

    $rotacion->visible = $status;

    $rotacion->save();

    return response()->json(['message' => 'Rotacion Medica eliminado.']);
  }
}
