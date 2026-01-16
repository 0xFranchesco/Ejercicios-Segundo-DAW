<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'reviews',
            'id' => (string) $this->id,
            'attributes' => [
                'comment' => $this->comment,
                'score' => (string) $this->score,
                'gameId' => (string) $this->game_id,
                'userId' => (string) $this->user_id,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
        ],
        'links' => [
            'self' => route('reviews.show', ['review' => $this->id]),
        ],
        ];
    }
}
