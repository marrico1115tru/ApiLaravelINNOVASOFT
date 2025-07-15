<?php

namespace App\Http\Controllers;

use App\Models\FichaFormacion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class FichaFormacionController extends Controller
{
    public function index()
    {
        $fichas = FichaFormacion::with(['titulado', 'usuarioResponsable'])->get();
        return response()->json(['message' => 'Lista de fichas obtenida exitosamente', 'data' => $fichas]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'id_titulado' => 'required|integer|exists:titulados,id',
            'id_usuario_responsable' => 'nullable|integer|exists:usuarios,id',
        ]);

        $ficha = FichaFormacion::create($validated);


        if ($ficha->id_usuario_responsable) {
            $usuario = Usuario::find($ficha->id_usuario_responsable);
            if ($usuario) {
                $usuario->id_ficha_formacion = $ficha->id;
                $usuario->save();
            }
        }

        return response()->json([
            'message' => 'Ficha creada exitosamente',
            'data' => $ficha->load(['titulado', 'usuarioResponsable']),
        ], 201);
    }

    public function show($id)
    {
        $ficha = FichaFormacion::with(['titulado', 'usuarioResponsable'])->findOrFail($id);
        return response()->json(['message' => 'Ficha encontrada exitosamente', 'data' => $ficha]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'id_titulado' => 'sometimes|integer|exists:titulados,id',
            'id_usuario_responsable' => 'nullable|integer|exists:usuarios,id',
        ]);

        $ficha = FichaFormacion::findOrFail($id);

        
        if (array_key_exists('id_usuario_responsable', $validated)) {
            
            Usuario::where('id_ficha_formacion', $ficha->id)
                ->where('id', '!=', $validated['id_usuario_responsable'])
                ->update(['id_ficha_formacion' => null]);

            
            if ($validated['id_usuario_responsable']) {
                $nuevo = Usuario::find($validated['id_usuario_responsable']);
                if ($nuevo) {
                    $nuevo->id_ficha_formacion = $ficha->id;
                    $nuevo->save();
                }
            }
        }

        $ficha->update($validated);

        return response()->json([
            'message' => 'Ficha actualizada exitosamente',
            'data' => $ficha->load(['titulado', 'usuarioResponsable']),
        ]);
    }

    public function destroy($id)
    {
        $ficha = FichaFormacion::findOrFail($id);

        
        if ($ficha->id_usuario_responsable) {
            $usuario = Usuario::find($ficha->id_usuario_responsable);
            if ($usuario && $usuario->id_ficha_formacion == $ficha->id) {
                $usuario->id_ficha_formacion = null;
                $usuario->save();
            }
        }

        $ficha->delete();
        return response()->json(['message' => 'Ficha eliminada exitosamente']);
    }
}
