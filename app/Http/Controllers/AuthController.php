<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        try {
            $usuario = Usuario::create($data);
            return response()->json([
                'success'   => true,
                'message'   => 'Usuario creado correctamente',
                'data'      => $usuario,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error('Error al crear el usuario', ['error' => $e->getMessage()]);
            return response()->json([
                'success'   => false,
                'message'   => 'Error al crear el usuario',
                'error'     => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json([
                    'success'   => false,
                    'message'   => 'Credenciales incorrectas'
                ], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json([
                'success'       => true,
                'message'       => 'Usuario autenticado correctamente',
                'data'          => [
                    'access_token'  => $token,
                    'token_type'    => 'bearer',
                    'expires_in'    => JWTAuth::factory()->getTTL() * 60 
                ]
            ], Response::HTTP_OK);
        } catch (JWTException $e) {
            Log::error('Error al generar el token', ['error' => $e->getMessage()]);
            return response()->json([
                'success'   => false,
                'message'   => 'Error al generar el token',
                'error'     => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function getUser(): JsonResponse
    {
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success'   => false,
                'message'   => 'Usuario no autenticado',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Usuario autenticado correctamente',
            'data'      => $user,
        ], Response::HTTP_OK);
    }


    public function logout(): JsonResponse
    {
        try {
            auth('api')->logout();
            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada correctamente',
            ], Response::HTTP_OK);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cerrar sesión',
                'error'   => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}