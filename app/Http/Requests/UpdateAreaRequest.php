<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_area' => 'required|string|max:255',
            'id_sede' => 'required|exists:sedes,id',
        ];
    }
}
