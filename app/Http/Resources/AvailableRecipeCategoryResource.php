<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AvailableRecipeCategoryResource extends JsonResource
{
        public function toArray($request) {
                return [
                    'id'        => $this->id,
                    'category'  => $this->category,
                    'createdAt' => $this->created_at,
                    'updatedAt' => $this->updated_at
                ];
        }
}
