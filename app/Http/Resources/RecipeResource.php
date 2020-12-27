<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RecipeResource extends JsonResource
{
        public function toArray($request) {
                return [
                    'id'                 => $this->id,
                    'title'              => $this->title,
                    'author_id'          => $this->author_id,
                    'description'        => $this->description,
                    'time'               => $this->time,
                    'difficulty'         => $this->difficulty,
                    'portions'           => $this->portions,
                    'ingredients'        => json_decode($this->ingredients),
                    'preparation_method' => json_decode($this->preparation_method),
                    'createdAt'          => $this->created_at,
                    'updatedAt'          => $this->updated_at
                ];
        }
}
