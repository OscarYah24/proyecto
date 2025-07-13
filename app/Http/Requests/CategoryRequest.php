<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Cambia a true para permitir la validación
    }

    /**
     * Reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:120',
            'descripcion' => 'required|string|max:120',
        ];
    }

    /**
     * Mensajes de error personalizados para las reglas de validación.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto válida.',
            'name.max' => 'El nombre no puede exceder los 120 caracteres.',
            
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto válida.',
            'descripcion.max' => 'La descripción no puede exceder los 120 caracteres.',
        ];
    }

    /**
     * Nombres de atributos personalizados para mensajes de error.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nombre de categoría',
            'descripcion' => 'descripción',
        ];
    }
}