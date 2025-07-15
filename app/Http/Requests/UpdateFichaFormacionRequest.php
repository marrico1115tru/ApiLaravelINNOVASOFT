<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFichaFormacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'id_titulado' => 'sometimes|integer|exists:titulados,id',
            'id_usuario_responsable' => 'nullable|integer|exists:usuarios,id',
        ];
    }
}
