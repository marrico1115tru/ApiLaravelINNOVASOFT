<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSitioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'ubicacion' => 'sometimes|string|max:255',
            'id_area' => 'sometimes|integer|exists:areas,id',
            'id_tipo_sitio' => 'sometimes|integer|exists:tipo_sitio,id',
            'estado' => 'sometimes|in:activo,inactivo',
        ];
    }
}
