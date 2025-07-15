<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuloRequest;
use App\Http\Requests\UpdateModuloRequest;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::with('opciones')->get();
        return response()->json(['message' => 'Lista de módulos obtenida exitosamente', 'data' => $modulos]);
    }

    public function store(StoreModuloRequest $request)
    {
        $modulo = Modulo::create($request->validated());
        return response()->json(['message' => 'Módulo creado exitosamente', 'data' => $modulo], 201);
    }

    public function show($id)
    {
        $modulo = Modulo::with('opciones')->findOrFail($id);
        return response()->json(['message' => 'Módulo encontrado exitosamente', 'data' => $modulo]);
    }

    public function update(UpdateModuloRequest $request, $id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->validated());
        return response()->json(['message' => 'Módulo actualizado exitosamente', 'data' => $modulo]);
    }

    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();
        return response()->json(['message' => 'Módulo eliminado exitosamente']);
    }
}
