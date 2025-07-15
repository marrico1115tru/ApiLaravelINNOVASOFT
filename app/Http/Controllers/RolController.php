<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();
        return response()->json(['message' => 'Lista de roles obtenida exitosamente', 'data' => $roles]);
    }

    public function store(StoreRolRequest $request)
    {
        $rol = Rol::create($request->validated());
        return response()->json(['message' => 'Rol creado exitosamente', 'data' => $rol], 201);
    }

    public function show($id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json(['message' => 'Rol encontrado exitosamente', 'data' => $rol]);
    }

    public function update(UpdateRolRequest $request, $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->validated());
        return response()->json(['message' => 'Rol actualizado exitosamente', 'data' => $rol]);
    }

    public function destroy($id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return response()->json(['message' => 'Rol eliminado exitosamente']);
    }
}
