<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource
{
        public function toArray($request) {
                return [
                    'id'         => $this->id,
                    'username'   => $this->username,
                    'email'      => $this->email,
                    'firstName'  => $this->first_name,
                    'lastName'   => $this->last_name,
                    'roles'      => $this->roles,
                    'createdAt'  => $this->created_at,
                    'updatedAt'  => $this->updated_at
                ];
        }
}
