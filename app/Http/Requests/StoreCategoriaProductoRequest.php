<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100|unique:categorias_productos,nombre',
            'unpsc' => 'nullable|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 100 caracteres.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'unpsc.string' => 'El código UNSPSC debe ser una cadena de texto.',
            'unpsc.max' => 'El código UNSPSC no debe exceder los 20 caracteres.',
        ];
    }
}
