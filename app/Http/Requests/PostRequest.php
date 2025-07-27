<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado para hacer esta solicitud
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Obtener las reglas de validación que se aplican a la solicitud
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:5',
                'max:255',
                // ✅ REGEX MÁS FLEXIBLE: acepta letras con tildes, números, espacios y algunos símbolos
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\-_.,!?]+$/'
            ],
            'content' => [
                'required',
                'string',
                'min:10',
                'max:5000'
            ],
            'author' => [
                'required',
                'string',
                'min:2',
                'max:100',
                // ✅ REGEX MÁS FLEXIBLE: acepta letras con tildes y espacios
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'tags' => [
                'nullable',
                'array',
                'max:5'
            ],
            'tags.*' => [
                'string',
                'max:50'
            ],
            'status' => [
                'nullable',
                'string',
                'in:draft,published,archived'
            ]
        ];
    }

    /**
     * Obtener mensajes de error personalizados para las reglas de validación definidas
     */
    public function messages(): array
    {
        return [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'title.max' => 'El título no puede exceder 255 caracteres.',
            'title.regex' => 'El título contiene caracteres no permitidos.',
            
            'content.required' => 'El contenido es obligatorio.',
            'content.min' => 'El contenido debe tener al menos 10 caracteres.',
            'content.max' => 'El contenido no puede exceder 5000 caracteres.',
            
            'author.required' => 'El autor es obligatorio.',
            'author.min' => 'El nombre del autor debe tener al menos 2 caracteres.',
            'author.max' => 'El nombre del autor no puede exceder 100 caracteres.',
            'author.regex' => 'El nombre del autor solo puede contener letras y espacios.',
            
            'category_id.required' => 'La categoría es obligatoria.',
            'category_id.integer' => 'La categoría debe ser un número entero.',
            'category_id.exists' => 'La categoría seleccionada no existe.',
            
            'tags.array' => 'Los tags deben ser un array.',
            'tags.max' => 'No puedes agregar más de 5 tags.',
            'tags.*.string' => 'Cada tag debe ser una cadena de texto.',
            'tags.*.max' => 'Cada tag no puede exceder 50 caracteres.',
            
            'status.in' => 'El estado debe ser: draft, published o archived.'
        ];
    }

    /**
     * Obtener nombres de atributos personalizados para errores de validación
     */
    public function attributes(): array
    {
        return [
            'title' => 'título',
            'content' => 'contenido',
            'author' => 'autor',
            'category_id' => 'categoría',
            'tags' => 'etiquetas',
            'status' => 'estado'
        ];
    }

    /**
     * Manejar una solicitud de validación fallida
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ], 422)
        );
    }
}