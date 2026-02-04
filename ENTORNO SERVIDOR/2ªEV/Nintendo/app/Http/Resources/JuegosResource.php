<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JuegosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [

            'type' => 'juegos',
            'id' => (string) $this->id,

            'attributes' => [
                'name' => $this->name,
                'developer' => $this->developer,
                'releaseYear' => (string) $this->release_year,
                'price' => $this->price,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],

            'links' => [
                'self' => route('consolas.show', ['consola' => $this->consola->id])
            ],

        ];

    }


}
