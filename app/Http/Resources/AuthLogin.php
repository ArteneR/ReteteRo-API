<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class AuthLogin extends JsonResource
{
        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        public function toArray($request) {
                return [
                    'id'          => $this->id,
                    'username'    => $this->username,
                    'email'       => $this->email,
                    'firstName'   => $this->first_name,
                    'lastName'    => $this->last_name,
                    'createdAt'   => $this->created_at,
                    'updatedAt'   => $this->updated_at,
                    'accessToken' => array(
                        'jwt'       => $this->access_token['jwt'],
                        'type'      => $this->access_token['type'],
                        'expiresIn' => $this->access_token['expires_in']
                    )
                ];
        }
}
