<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMunicipioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100|unique:municipios,nombre',
            'departamento' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del municipio es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe superar los 100 caracteres.',
            'nombre.unique' => 'Ya existe un municipio con ese nombre.',

            'departamento.required' => 'El departamento es obligatorio.',
            'departamento.string' => 'El departamento debe ser una cadena de texto.',
            'departamento.max' => 'El departamento no debe superar los 100 caracteres.',
        ];
    }
}
