<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;


class UserController extends Controller
{
        public function __construct() {
                $this->middleware('auth:api', ['except' => ['get']]);
                $this->middleware('is_admin:api', ['only' => ['']]);
        }


        public function getAll() {
                return new UserCollection(User::all());
        }


        public function get($id) {
                return new UserResource(User::findOrFail($id));
        }
}
