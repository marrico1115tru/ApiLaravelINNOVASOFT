<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Autoriza esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para el registro.
     */
    public function rules(): array
    {
        return [
            'nombre'                => 'required|string|max:100',
            'apellido'              => 'required|string|max:100',
            'cedula'                => 'required|string|max:20|unique:usuarios,cedula',
            'email'                 => 'required|string|email|unique:usuarios,email',
            'telefono'              => 'nullable|string|max:20',
            'id_area'               => 'required|exists:areas,id',
            'id_rol'                => 'required|exists:roles,id',
            'id_ficha_formacion'    => 'nullable|exists:fichas_formacion,id',
            'password'              => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * Mensajes personalizados.
     */
    public function messages(): array
    {
        return [
            'nombre.required'               => 'El nombre es obligatorio.',
            'apellido.required'             => 'El apellido es obligatorio.',
            'cedula.required'               => 'La cédula es obligatoria.',
            'cedula.unique'                 => 'Esta cédula ya está registrada.',
            'email.required'                => 'El correo electrónico es obligatorio.',
            'email.email'                   => 'El correo debe tener un formato válido.',
            'email.unique'                  => 'Este correo ya está registrado.',
            'telefono.max'                  => 'El teléfono no puede tener más de 20 caracteres.',
            'id_area.required'              => 'El área es obligatoria.',
            'id_area.exists'                => 'El área seleccionada no existe.',
            'id_rol.required'               => 'El rol es obligatorio.',
            'id_rol.exists'                 => 'El rol seleccionado no existe.',
            'id_ficha_formacion.exists'     => 'La ficha seleccionada no existe.',
            'password.required'             => 'La contraseña es obligatoria.',
            'password.min'                  => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed'            => 'La confirmación de la contraseña no coincide.',
        ];
    }
}
