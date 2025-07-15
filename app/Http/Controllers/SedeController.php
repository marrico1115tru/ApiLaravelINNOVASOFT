<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSedeRequest;
use App\Http\Requests\UpdateSedeRequest;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    public function index()
    {
        $sedes = Sede::with('centroFormacion')->get();
        return response()->json(['message' => 'Lista de sedes obtenida exitosamente', 'data' => $sedes]);
    }

    public function store(StoreSedeRequest $request)
    {
        $sede = Sede::create($request->validated());
        return response()->json(['message' => 'Sede creada exitosamente', 'data' => $sede], 201);
    }

    public function show($id)
    {
        $sede = Sede::with('centroFormacion')->findOrFail($id);
        return response()->json(['message' => 'Sede encontrada exitosamente', 'data' => $sede]);
    }

    public function update(UpdateSedeRequest $request, $id)
    {
        $sede = Sede::findOrFail($id);
        $sede->update($request->validated());
        return response()->json(['message' => 'Sede actualizada exitosamente', 'data' => $sede]);
    }

    public function destroy($id)
    {
        $sede = Sede::findOrFail($id);
        $sede->delete();
        return response()->json(['message' => 'Sede eliminada exitosamente']);
    }
}
