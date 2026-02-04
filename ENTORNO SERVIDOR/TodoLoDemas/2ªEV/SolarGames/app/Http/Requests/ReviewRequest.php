<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comment' => 'nullable|string|max:1000',
            'score' => 'required|integer|min:1|max:10',
            'game_id' => 'required|exists:games,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'comment.string' => 'El comentario debe ser una cadena de texto.',
            'comment.max' => 'El comentario no debe exceder de 1000 caracteres.',
            'score.required' => 'La puntuación es obligatoria.',
            'score.integer' => 'La puntuación debe ser un número entero.',
            'score.min' => 'La puntuación mínima es 1.',
            'score.max' => 'La puntuación máxima es 10.',
            'game_id.required' => 'El ID del juego es obligatorio.',
            'game_id.exists' => 'El juego seleccionado no es válido.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El usuario seleccionado no es válido.',
        ];
    }

}
