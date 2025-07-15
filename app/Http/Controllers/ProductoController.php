<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return response()->json(['message' => 'Lista de productos obtenida exitosamente', 'data' => $productos]);
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = Producto::create($request->validated());
        return response()->json(['message' => 'Producto creado exitosamente', 'data' => $producto], 201);
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return response()->json(['message' => 'Producto encontrado exitosamente', 'data' => $producto]);
    }

    public function update(UpdateProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->validated());
        return response()->json(['message' => 'Producto actualizado exitosamente', 'data' => $producto]);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }
}
