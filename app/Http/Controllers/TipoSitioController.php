<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoSitioRequest;
use App\Http\Requests\UpdateTipoSitioRequest;
use App\Models\TipoSitio;
use Illuminate\Http\Request;

class TipoSitioController extends Controller
{
    public function index()
    {
        $tiposSitio = TipoSitio::all();
        return response()->json(['message' => 'Lista de tipos de sitio obtenida exitosamente', 'data' => $tiposSitio]);
    }

    public function store(StoreTipoSitioRequest $request)
    {
        $tipoSitio = TipoSitio::create($request->validated());
        return response()->json(['message' => 'Tipo de sitio creado exitosamente', 'data' => $tipoSitio], 201);
    }

    public function show($id)
    {
        $tipoSitio = TipoSitio::findOrFail($id);
        return response()->json(['message' => 'Tipo de sitio encontrado exitosamente', 'data' => $tipoSitio]);
    }

    public function update(UpdateTipoSitioRequest $request, $id)
    {
        $tipoSitio = TipoSitio::findOrFail($id);
        $tipoSitio->update($request->validated());
        return response()->json(['message' => 'Tipo de sitio actualizado exitosamente', 'data' => $tipoSitio]);
    }

    public function destroy($id)
    {
        $tipoSitio = TipoSitio::findOrFail($id);
        $tipoSitio->delete();
        return response()->json(['message' => 'Tipo de sitio eliminado exitosamente']);
    }
}
