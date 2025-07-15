<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpcionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_opcion' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'ruta_frontend' => 'required|string|max:150',
            'id_modulo' => 'required|integer|exists:modulos,id',
        ];
    }
}
