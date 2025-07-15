<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['entrega', 'inventario'])->get();
        return response()->json(['message' => 'Lista de movimientos obtenida', 'data' => $movimientos]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_entrega' => 'required|exists:entrega_material,id',
            'tipo_movimiento' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:1',
            'id_producto_inventario' => 'required|exists:inventario,id_producto_inventario',
            'fecha_movimiento' => 'required|date',
        ]);

        $movimiento = Movimiento::create($data);
        return response()->json(['message' => 'Movimiento registrado correctamente', 'data' => $movimiento], 201);
    }

    public function show($id)
    {
        $movimiento = Movimiento::with(['entrega', 'inventario'])->findOrFail($id);
        return response()->json(['message' => 'Movimiento encontrado', 'data' => $movimiento]);
    }

    public function update(Request $request, $id)
    {
        $movimiento = Movimiento::findOrFail($id);

        $data = $request->validate([
            'id_entrega' => 'required|exists:entrega_material,id',
            'tipo_movimiento' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:1',
            'id_producto_inventario' => 'required|exists:inventario,id_producto_inventario',
            'fecha_movimiento' => 'required|date',
        ]);

        $movimiento->update($data);
        return response()->json(['message' => 'Movimiento actualizado correctamente', 'data' => $movimiento]);
    }

    public function destroy($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->delete();
        return response()->json(['message' => 'Movimiento eliminado correctamente']);
    }
}
