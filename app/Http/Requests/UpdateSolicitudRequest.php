<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSolicitudRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_usuario_solicitante' => 'required|exists:usuarios,id',
            'fecha_solicitud' => 'required|date',
            'estado_solicitud' => 'required|string|max:50',
        ];
    }
}
