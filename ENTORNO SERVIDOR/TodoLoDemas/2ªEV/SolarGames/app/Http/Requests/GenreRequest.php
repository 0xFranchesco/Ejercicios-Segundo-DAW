<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:2,33|unique:genres,name',
        ];
    }

    public function messages(): array
    {

        return [
            'name.required' => 'El nombre del género es obligatorio.',
            'name.string' => 'El nombre del género debe ser una cadena de texto.',
            'name.min' => 'El nombre del género debe tener al menos 3 caracteres.',
            'name.max' => 'El nombre del género no debe exceder de 32 caracteres.',
            'name.unique' => 'El nombre del género ya existe. Por favor, elige otro nombre.',
        ];

    }

}
