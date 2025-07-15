<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Autoriza esta solicitud (por defecto true).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para login.
     */
    public function rules(): array
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required|string|min:6',
        ];
    }

    /**
     * Mensajes personalizados para errores de validación.
     */
    public function messages(): array
    {
        return [
            'email.required'        => 'El correo electrónico es obligatorio.',
            'email.email'           => 'El correo debe tener un formato válido.',
            'password.required'     => 'La contraseña es obligatoria.',
            'password.min'          => 'La contraseña debe tener al menos 6 caracteres.',
        ];
    }
}
