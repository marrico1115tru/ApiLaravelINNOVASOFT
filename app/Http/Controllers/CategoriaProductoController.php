<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaProductoRequest;
use App\Http\Requests\UpdateCategoriaProductoRequest;
use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaProducto::all();
        return response()->json(['message' => 'Lista de categorías de productos obtenida exitosamente', 'data' => $categorias]);
    }

    public function store(StoreCategoriaProductoRequest $request)
    {
        $categoria = CategoriaProducto::create($request->validated());
        return response()->json(['message' => 'Categoría de producto creada exitosamente', 'data' => $categoria], 201);
    }

    public function show($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        return response()->json(['message' => 'Categoría de producto encontrada exitosamente', 'data' => $categoria]);
    }

    public function update(UpdateCategoriaProductoRequest $request, $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->update($request->validated());
        return response()->json(['message' => 'Categoría de producto actualizada exitosamente', 'data' => $categoria]);
    }

    public function destroy($id)
    {
        $categoria = CategoriaProducto::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoría de producto eliminada exitosamente']);
    }
}
