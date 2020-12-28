<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\AvailableRecipeCategory;


class AvailableRecipeCategoryCollection extends ResourceCollection
{
        public function toArray($request) {
                $this->collection->transform(function(AvailableRecipeCategory $availableRecipeCategory) {
                        return (new AvailableRecipeCategoryResource($availableRecipeCategory));
                });
        
                return parent::toArray($request);
        }
}
