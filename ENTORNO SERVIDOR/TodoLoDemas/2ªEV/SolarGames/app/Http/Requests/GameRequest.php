<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'title' => 'required|string|between:1,65|unique:games,title',
            'synopsis' => 'nullable|string|max:1000',
            'developer' => 'nullable|string|between:2,20',
            'publisher' => 'nullable|string|between:2,20',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
            'genre_id' => 'required|exists:genres,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El título del juego es obligatorio.',
            'title.string' => 'El título del juego debe ser una cadena de texto.',
            'title.min' => 'El título del juego debe tener al menos 2 caracteres.',
            'title.max' => 'El título del juego no debe exceder de 64 caracteres.',
            'title.unique' => 'El título del juego ya existe. Por favor, elige otro título.',
            'synopsis.string' => 'La sinopsis debe ser una cadena de texto.',
            'synopsis.max' => 'La sinopsis no debe exceder de 1000 caracteres.',
            'developer.string' => 'El desarrollador debe ser una cadena de texto.',
            'developer.min' => 'El desarrollador debe tener al menos 2 caracteres.',
            'developer.max' => 'El desarrollador no debe exceder de 20 caracteres.',
            'publisher.string' => 'El editor debe ser una cadena de texto.',
            'publisher.min' => 'El editor debe tener al menos 2 caracteres.',
            'publisher.max' => 'El editor no debe exceder de 20 caracteres.',
            'release_year.required' => 'El año de lanzamiento es obligatorio.',
            'release_year.integer' => 'El año de lanzamiento debe ser un número entero.',
            'release_year.min' => 'El año de lanzamiento no puede ser anterior a 1900.',
            'release_year.max' => 'El año de lanzamiento no puede ser posterior al año actual.',
            'genre_id.required' => 'El género es obligatorio.',
            'genre_id.exists' => 'El género seleccionado no es válido.',
        ];
    }

}
