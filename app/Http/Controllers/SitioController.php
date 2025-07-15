<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSitioRequest;
use App\Http\Requests\UpdateSitioRequest;
use App\Models\Sitio;

class SitioController extends Controller
{
    public function index()
    {
        $sitios = Sitio::with(['area', 'tipoSitio'])->get();
        return response()->json(['message' => 'Lista de sitios obtenida exitosamente', 'data' => $sitios]);
    }

    public function store(StoreSitioRequest $request)
    {
        $sitio = Sitio::create($request->validated());
        return response()->json(['message' => 'Sitio creado exitosamente', 'data' => $sitio], 201);
    }

    public function show($id)
    {
        $sitio = Sitio::with(['area', 'tipoSitio'])->findOrFail($id);
        return response()->json(['message' => 'Sitio encontrado exitosamente', 'data' => $sitio]);
    }

    public function update(UpdateSitioRequest $request, $id)
    {
        $sitio = Sitio::findOrFail($id);
        $sitio->update($request->validated());
        return response()->json(['message' => 'Sitio actualizado exitosamente', 'data' => $sitio]);
    }

    public function destroy($id)
    {
        $sitio = Sitio::findOrFail($id);
        $sitio->delete();
        return response()->json(['message' => 'Sitio eliminado exitosamente']);
    }
}
