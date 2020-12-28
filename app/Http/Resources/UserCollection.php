<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\User;


class UserCollection extends ResourceCollection
{
        public function toArray($request) {
                $this->collection->transform(function(User $user) {
                        return (new UserResource($user));
                });
        
                return parent::toArray($request);
        }
}