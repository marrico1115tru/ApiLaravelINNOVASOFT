<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::with('sede')->get();
        return response()->json(['message' => 'Lista de áreas obtenida exitosamente', 'data' => $areas]);
    }

    public function store(StoreAreaRequest $request)
    {
        $area = Area::create($request->validated());
        return response()->json(['message' => 'Área creada exitosamente', 'data' => $area], 201);
    }

    public function show($id)
    {
        $area = Area::with('sede')->findOrFail($id);
        return response()->json(['message' => 'Área encontrada exitosamente', 'data' => $area]);
    }

    public function update(UpdateAreaRequest $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->update($request->validated());
        return response()->json(['message' => 'Área actualizada exitosamente', 'data' => $area]);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return response()->json(['message' => 'Área eliminada exitosamente']);
    }
}
