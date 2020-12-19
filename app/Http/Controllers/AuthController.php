<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Http\Resources\AuthLogin as AuthLoginResource;


class AuthController extends Controller
{
        public function __construct() {
                $this->middleware('auth:api', ['except' => ['register', 'login', 'refreshToken']]);
        }


        public function register(Request $request) {
                $validator = Validator::make($request->all(), [
                        'username'   => 'required|string|between:2,100',
                        'password'   => 'required|string|confirmed|min:6',
                        'email'      => 'required|string|email|max:100|unique:users',
                        'first_name' => 'required|string|between:2,100',
                        'last_name'  => 'required|string|between:2,100'
                ]);

                if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                }

                $user = User::create(array_merge(
                        $validator->validated(),
                        ['password' => bcrypt($request->password)],
                        ['roles'    => 'user']
                ));

                return response()->json([
                        'message' => 'User successfully registered',
                        'user'    => $user
                ], 201);
        }


        public function login(Request $request) {
                $requestParams = $request->all();
                $validations = array(
                        'username' => 'required',
                        'password' => 'required|string|min:6'
                );

                $authType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

                if ($authType == 'email') { 
                        $requestParams['email'] = $request->username;
                        $validations['email']   = 'required|email';
                        unset($validations['username']);
                        unset($requestParams['username']);
                }

                $validator = Validator::make($requestParams, $validations);

                if ($validator->fails()) {
                        return response()->json($validator->errors(), 422);
                }

                if (!$token = auth()->attempt($validator->validated())) {
                        return response()->json(['error' => 'Unauthorized'], 401);
                }

                return $this->createNewToken($token);
        }


        public function logout() {
                auth()->logout();

                return response()->json(['message' => 'User successfully signed out']);
        }


        public function getUserProfile() {
                return response()->json(auth()->user());
        }


        public function updateUserProfile(Request $request) {
                $user = auth()->user();

                $validator = Validator::make($request->all(), [
                        'username'   => "string|between:2,100|unique:users,username,$user->id",
                        'password'   => 'string|confirmed|min:6',
                        'email'      => "string|email|max:100|unique:users,email,$user->id",
                        'first_name' => 'string|between:2,100',
                        'last_name'  => 'string|between:2,100'
                ]);

                if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                }

                $user->username   = $request->username   ? $request->username         : $user->username;
                $user->password   = $request->password   ? bcrypt($request->password) : $user->password;
                $user->email      = $request->email      ? $request->email            : $user->email;
                $user->first_name = $request->first_name ? $request->first_name       : $user->first_name;
                $user->last_name  = $request->last_name  ? $request->last_name        : $user->last_name;

                $user->save();

                return response()->json([
                        'message' => 'User successfully updated',
                        'user'    => $user
                ], 200);
        }


        public function deleteUserProfile() {
                $user = auth()->user();
                $userToDelete = $user;
                $user->delete();

                return response()->json([
                        'message' => 'User successfully deleted',
                        'user'    => $userToDelete
                ], 200);
        }


        protected function createNewToken($token) {
                $user = auth()->user();
                $user['access_token'] = [
                        'jwt'        => $token,
                        'type'       => 'bearer',
                        'expires_in' => auth()->factory()->getTTL() * 60
                ];

                return (new AuthLoginResource($user))
                        ->response()
                        ->setStatusCode(201);
        }


        public function refreshToken() {
                try {
                        $newToken = $this->createNewToken(auth()->refresh());
                }
                catch (\Exception $e) {
                        return response()->json(['status' => 'fail', 'message' => 'User not authenticated yet']);
                }

                return $newToken;
        }
}