<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTituladoRequest;
use App\Http\Requests\UpdateTituladoRequest;
use App\Models\Titulado;
use Illuminate\Http\Request;

class TituladoController extends Controller
{
    public function index()
    {
        $titulados = Titulado::all();
        return response()->json(['message' => 'Lista de titulados obtenida exitosamente', 'data' => $titulados]);
    }

    public function store(StoreTituladoRequest $request)
    {
        $titulado = Titulado::create($request->validated());
        return response()->json(['message' => 'Titulado creado exitosamente', 'data' => $titulado], 201);
    }

    public function show($id)
    {
        $titulado = Titulado::findOrFail($id);
        return response()->json(['message' => 'Titulado encontrado exitosamente', 'data' => $titulado]);
    }

    public function update(UpdateTituladoRequest $request, $id)
    {
        $titulado = Titulado::findOrFail($id);
        $titulado->update($request->validated());
        return response()->json(['message' => 'Titulado actualizado exitosamente', 'data' => $titulado]);
    }

    public function destroy($id)
    {
        $titulado = Titulado::findOrFail($id);
        $titulado->delete();
        return response()->json(['message' => 'Titulado eliminado exitosamente']);
    }
}
