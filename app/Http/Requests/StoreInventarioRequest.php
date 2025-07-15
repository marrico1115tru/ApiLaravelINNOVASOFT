<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_producto' => 'required|exists:productos,id',
            'stock' => 'required|integer|min:0',
            'fk_sitio' => 'required|exists:sitio,id',
        ];
    }
}
