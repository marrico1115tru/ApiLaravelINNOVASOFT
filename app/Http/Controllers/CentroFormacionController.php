<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCentroFormacionRequest;
use App\Http\Requests\UpdateCentroFormacionRequest;
use App\Models\CentroFormacion;
use Illuminate\Http\Request;

class CentroFormacionController extends Controller
{
    public function index()
    {
        $centros = CentroFormacion::with('municipio')->get();
        return response()->json(['message' => 'Lista de centros de formación obtenida exitosamente', 'data' => $centros]);
    }

    public function store(StoreCentroFormacionRequest $request)
    {
        $centro = CentroFormacion::create($request->validated());
        return response()->json(['message' => 'Centro de formación creado exitosamente', 'data' => $centro], 201);
    }

    public function show($id)
    {
        $centro = CentroFormacion::with('municipio')->findOrFail($id);
        return response()->json(['message' => 'Centro de formación encontrado exitosamente', 'data' => $centro]);
    }

    public function update(UpdateCentroFormacionRequest $request, $id)
    {
        $centro = CentroFormacion::findOrFail($id);
        $centro->update($request->validated());
        return response()->json(['message' => 'Centro de formación actualizado exitosamente', 'data' => $centro]);
    }

    public function destroy($id)
    {
        $centro = CentroFormacion::findOrFail($id);
        $centro->delete();
        return response()->json(['message' => 'Centro de formación eliminado exitosamente']);
    }
}
