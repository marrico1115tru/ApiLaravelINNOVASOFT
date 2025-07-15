<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::with(['producto', 'sitio'])->get();
        return response()->json(['message' => 'Inventario listado exitosamente', 'data' => $inventario]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'stock' => 'required|integer|min:0',
            'fk_sitio' => 'required|exists:sitio,id',
        ]);

        $registro = Inventario::create($data);
        return response()->json(['message' => 'Registro de inventario creado', 'data' => $registro], 201);
    }

    public function show($id)
    {
        $registro = Inventario::with(['producto', 'sitio'])->findOrFail($id);
        return response()->json(['message' => 'Registro de inventario encontrado', 'data' => $registro]);
    }

    public function update(Request $request, $id)
    {
        $registro = Inventario::findOrFail($id);

        $data = $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'stock' => 'required|integer|min:0',
            'fk_sitio' => 'required|exists:sitio,id',
        ]);

        $registro->update($data);
        return response()->json(['message' => 'Registro de inventario actualizado', 'data' => $registro]);
    }

    public function destroy($id)
    {
        $registro = Inventario::findOrFail($id);
        $registro->delete();
        return response()->json(['message' => 'Registro de inventario eliminado']);
    }
}
