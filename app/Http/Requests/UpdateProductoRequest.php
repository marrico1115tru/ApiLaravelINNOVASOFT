<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|string|max:100',
            'descripcion' => 'sometimes|string|max:255',
            'fecha_vencimiento' => 'sometimes|date',
            'id_categoria' => 'sometimes|integer|exists:categorias_productos,id',
        ];
    }
}
