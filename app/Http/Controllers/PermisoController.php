<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::with(['rol', 'opcion'])->get();
        return response()->json(['message' => 'Lista de permisos obtenida exitosamente', 'data' => $permisos]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_rol' => 'required|exists:roles,id',
            'id_opcion' => 'required|exists:opciones,id',
            'puede_ver' => 'boolean',
            'puede_crear' => 'boolean',
            'puede_editar' => 'boolean',
            'puede_eliminar' => 'boolean',
        ]);

        $permiso = Permiso::create($data);
        return response()->json(['message' => 'Permiso creado exitosamente', 'data' => $permiso], 201);
    }

    public function show($id)
    {
        $permiso = Permiso::with(['rol', 'opcion'])->findOrFail($id);
        return response()->json(['message' => 'Permiso encontrado exitosamente', 'data' => $permiso]);
    }

    public function update(Request $request, $id)
    {
        $permiso = Permiso::findOrFail($id);

        $data = $request->validate([
            'id_rol' => 'required|exists:roles,id',
            'id_opcion' => 'required|exists:opciones,id',
            'puede_ver' => 'boolean',
            'puede_crear' => 'boolean',
            'puede_editar' => 'boolean',
            'puede_eliminar' => 'boolean',
        ]);

        $permiso->update($data);
        return response()->json(['message' => 'Permiso actualizado exitosamente', 'data' => $permiso]);
    }

    public function destroy($id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();
        return response()->json(['message' => 'Permiso eliminado exitosamente']);
    }
}
