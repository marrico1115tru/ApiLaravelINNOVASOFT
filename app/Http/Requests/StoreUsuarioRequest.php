<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cedula' => 'required|string|max:20|unique:usuarios,cedula',
            'email' => 'required|email|max:150|unique:usuarios,email',
            'telefono' => 'nullable|string|max:20',
            'id_area' => 'required|exists:areas,id',
            'id_rol' => 'required|exists:roles,id',
            'id_ficha_formacion' => 'nullable|exists:fichas_formacion,id',
            'password' => 'required|string|min:6',
        ];
    }
}
