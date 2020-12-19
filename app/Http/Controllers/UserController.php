<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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


        public function create(Request $request) {
                $request->validate([
                        'username' => 'required|max:255',
                ]);

                $user = User::create($request->all());

                return (new UserResource($user))
                        ->response()
                        ->setStatusCode(201);
        }
        

        public function delete($id) {
                $user = User::findOrFail($id);
                $user->delete();

                return response()->json(null, 204);
        }
}
