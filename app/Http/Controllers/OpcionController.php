<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use Illuminate\Http\Request;

class OpcionController extends Controller
{
    public function index()
    {
        $opciones = Opcion::with('modulo')->get();
        return response()->json(['message' => 'Lista de opciones obtenida exitosamente', 'data' => $opciones]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_opcion' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'ruta_frontend' => 'required|string|max:150',
            'id_modulo' => 'required|integer|exists:modulos,id',
        ]);

        $opcion = Opcion::create($validated);

        return response()->json(['message' => 'Opción creada exitosamente', 'data' => $opcion], 201);
    }

    public function show($id)
    {
        $opcion = Opcion::with('modulo')->findOrFail($id);
        return response()->json(['message' => 'Opción encontrada exitosamente', 'data' => $opcion]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_opcion' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string',
            'ruta_frontend' => 'sometimes|string|max:150',
            'id_modulo' => 'sometimes|integer|exists:modulos,id',
        ]);

        $opcion = Opcion::findOrFail($id);
        $opcion->update($validated);

        return response()->json(['message' => 'Opción actualizada exitosamente', 'data' => $opcion]);
    }

    public function destroy($id)
    {
        $opcion = Opcion::findOrFail($id);
        $opcion->delete();
        return response()->json(['message' => 'Opción eliminada exitosamente']);
    }
}
