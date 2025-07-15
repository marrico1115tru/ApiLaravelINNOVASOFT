<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'apellido' => 'sometimes|string|max:100',
            'cedula' => 'sometimes|string|max:20|unique:usuarios,cedula,' . $this->route('id'),
            'email' => 'sometimes|email|max:150|unique:usuarios,email,' . $this->route('id'),
            'telefono' => 'nullable|string|max:20',
            'id_area' => 'sometimes|exists:areas,id',
            'id_rol' => 'sometimes|exists:roles,id',
            'id_ficha_formacion' => 'nullable|exists:fichas_formacion,id',
            'password' => 'nullable|string|min:6',
        ];
    }
}
