<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOpcionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_opcion' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string',
            'ruta_frontend' => 'sometimes|string|max:150',
            'id_modulo' => 'sometimes|integer|exists:modulos,id',
        ];
    }
}
