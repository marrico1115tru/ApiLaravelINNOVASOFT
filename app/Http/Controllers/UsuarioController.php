<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use App\Models\FichaFormacion;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with(['area', 'rol', 'fichaFormacion'])->get();
        return response()->json(['message' => 'Lista de usuarios obtenida exitosamente', 'data' => $usuarios]);
    }

    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $usuario = Usuario::create($data);


        if (!empty($data['id_ficha_formacion'])) {
            $ficha = FichaFormacion::find($data['id_ficha_formacion']);
            if ($ficha) {
                $ficha->id_usuario_responsable = $usuario->id;
                $ficha->save();
            }
        }

        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'data' => $usuario->load(['area', 'rol', 'fichaFormacion']),
        ], 201);
    }

    public function show($id)
    {
        $usuario = Usuario::with(['area', 'rol', 'fichaFormacion'])->findOrFail($id);
        return response()->json(['message' => 'Usuario encontrado exitosamente', 'data' => $usuario]);
    }

    public function update(UpdateUsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $usuario->update($data);

        
        if (array_key_exists('id_ficha_formacion', $data)) {
            $ficha = FichaFormacion::find($data['id_ficha_formacion']);
            if ($ficha) {
                $ficha->id_usuario_responsable = $usuario->id;
                $ficha->save();
            }
        }

        return response()->json([
            'message' => 'Usuario actualizado exitosamente',
            'data' => $usuario->load(['area', 'rol', 'fichaFormacion']),
        ]);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        
        if ($usuario->id_ficha_formacion) {
            $ficha = FichaFormacion::find($usuario->id_ficha_formacion);
            if ($ficha && $ficha->id_usuario_responsable === $usuario->id) {
                $ficha->id_usuario_responsable = null;
                $ficha->save();
            }
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado exitosamente']);
    }
}
