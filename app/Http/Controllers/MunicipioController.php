<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return response()->json(['message' => 'Lista de municipios obtenida exitosamente', 'data' => $municipios]);
    }

    public function store(StoreMunicipioRequest $request)
    {
        $municipio = Municipio::create($request->validated());
        return response()->json(['message' => 'Municipio creado exitosamente', 'data' => $municipio], 201);
    }

    public function show($id)
    {
        $municipio = Municipio::findOrFail($id);
        return response()->json(['message' => 'Municipio encontrado exitosamente', 'data' => $municipio]);
    }

    public function update(UpdateMunicipioRequest $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->validated());
        return response()->json(['message' => 'Municipio actualizado exitosamente', 'data' => $municipio]);
    }

    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return response()->json(['message' => 'Municipio eliminado exitosamente']);
    }
}
