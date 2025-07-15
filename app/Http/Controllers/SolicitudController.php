<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::with('solicitante')->get();
        return response()->json(['message' => 'Lista de solicitudes obtenida exitosamente', 'data' => $solicitudes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_usuario_solicitante' => 'required|exists:usuarios,id',
            'fecha_solicitud' => 'required|date',
            'estado_solicitud' => 'required|string|max:50',
        ]);

        $solicitud = Solicitud::create($data);
        return response()->json(['message' => 'Solicitud creada exitosamente', 'data' => $solicitud], 201);
    }

    public function show($id)
    {
        $solicitud = Solicitud::with('solicitante')->findOrFail($id);
        return response()->json(['message' => 'Solicitud encontrada exitosamente', 'data' => $solicitud]);
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);

        $data = $request->validate([
            'id_usuario_solicitante' => 'required|exists:usuarios,id',
            'fecha_solicitud' => 'required|date',
            'estado_solicitud' => 'required|string|max:50',
        ]);

        $solicitud->update($data);
        return response()->json(['message' => 'Solicitud actualizada exitosamente', 'data' => $solicitud]);
    }

    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();
        return response()->json(['message' => 'Solicitud eliminada exitosamente']);
    }
}
