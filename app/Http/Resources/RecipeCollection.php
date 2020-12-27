<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Recipe;


class RecipeCollection extends ResourceCollection
{
        public function toArray($request) {
                $this->collection->transform(function(Recipe $recipe) {
                        return (new RecipeResource($recipe));
                });
        
                return parent::toArray($request);
        }
}
