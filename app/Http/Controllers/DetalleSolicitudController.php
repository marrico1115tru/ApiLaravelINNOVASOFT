<?php

namespace App\Http\Controllers;

use App\Models\DetalleSolicitud;
use Illuminate\Http\Request;

class DetalleSolicitudController extends Controller
{
    public function index()
    {
        $detalles = DetalleSolicitud::with(['solicitud', 'producto'])->get();
        return response()->json(['message' => 'Lista de detalles de solicitudes obtenida', 'data' => $detalles]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_solicitud' => 'required|exists:solicitudes,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad_solicitada' => 'required|integer|min:1',
            'observaciones' => 'nullable|string',
        ]);

        $detalle = DetalleSolicitud::create($data);
        return response()->json(['message' => 'Detalle de solicitud creado exitosamente', 'data' => $detalle], 201);
    }

    public function show($id)
    {
        $detalle = DetalleSolicitud::with(['solicitud', 'producto'])->findOrFail($id);
        return response()->json(['message' => 'Detalle de solicitud encontrado', 'data' => $detalle]);
    }

    public function update(Request $request, $id)
    {
        $detalle = DetalleSolicitud::findOrFail($id);

        $data = $request->validate([
            'id_solicitud' => 'required|exists:solicitudes,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad_solicitada' => 'required|integer|min:1',
            'observaciones' => 'nullable|string',
        ]);

        $detalle->update($data);
        return response()->json(['message' => 'Detalle de solicitud actualizado', 'data' => $detalle]);
    }

    public function destroy($id)
    {
        $detalle = DetalleSolicitud::findOrFail($id);
        $detalle->delete();
        return response()->json(['message' => 'Detalle de solicitud eliminado']);
    }
}
