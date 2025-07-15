<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSitioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:255',
            'id_area' => 'required|integer|exists:areas,id',
            'id_tipo_sitio' => 'required|integer|exists:tipo_sitio,id',
            'estado' => 'required|in:activo,inactivo',
        ];
    }
}
