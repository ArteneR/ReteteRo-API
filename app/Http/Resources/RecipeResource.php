<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RecipeResource extends JsonResource
{
        public function toArray($request) {
                foreach ($this->images as $image) {
                        if ($image->is_cover_image === 'yes') {
                                $cover_image = $image->image;
                        }
                }

                if (!isset($cover_image)) { 
                        $cover_image = isset($this->images[0]['image']) ? $this->images[0]['image'] : ''; 
                }


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
                    'cover_image'        => $cover_image,
                    'createdAt'          => $this->created_at,
                    'updatedAt'          => $this->updated_at
                ];
        }
}
