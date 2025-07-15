<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFichaFormacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'id_titulado' => 'required|integer|exists:titulados,id',
            'id_usuario_responsable' => 'nullable|integer|exists:usuarios,id',
        ];
    }
}
