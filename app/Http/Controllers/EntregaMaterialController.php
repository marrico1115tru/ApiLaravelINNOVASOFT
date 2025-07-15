<?php

namespace App\Http\Controllers;

use App\Models\EntregaMaterial;
use Illuminate\Http\Request;

class EntregaMaterialController extends Controller
{
    public function index()
    {
        $entregas = EntregaMaterial::with(['solicitud', 'responsable', 'ficha'])->get();
        return response()->json(['message' => 'Lista de entregas obtenida correctamente', 'data' => $entregas]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_solicitud' => 'required|exists:solicitudes,id',
            'id_usuario_responsable' => 'required|exists:usuarios,id',
            'fecha_entrega' => 'required|date',
            'observaciones' => 'nullable|string',
            'id_ficha_formacion' => 'required|exists:fichas_formacion,id',
        ]);

        $entrega = EntregaMaterial::create($data);
        return response()->json(['message' => 'Entrega registrada correctamente', 'data' => $entrega], 201);
    }

    public function show($id)
    {
        $entrega = EntregaMaterial::with(['solicitud', 'responsable', 'ficha'])->findOrFail($id);
        return response()->json(['message' => 'Entrega encontrada', 'data' => $entrega]);
    }

    public function update(Request $request, $id)
    {
        $entrega = EntregaMaterial::findOrFail($id);

        $data = $request->validate([
            'id_solicitud' => 'required|exists:solicitudes,id',
            'id_usuario_responsable' => 'required|exists:usuarios,id',
            'fecha_entrega' => 'required|date',
            'observaciones' => 'nullable|string',
            'id_ficha_formacion' => 'required|exists:fichas_formacion,id',
        ]);

        $entrega->update($data);
        return response()->json(['message' => 'Entrega actualizada correctamente', 'data' => $entrega]);
    }

    public function destroy($id)
    {
        $entrega = EntregaMaterial::findOrFail($id);
        $entrega->delete();
        return response()->json(['message' => 'Entrega eliminada correctamente']);
    }
}
