<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;


class AuthController extends Controller
{
        public function __construct() {
                $this->middleware('auth:api', ['except' => ['register', 'login']]);
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
                            ['password' => bcrypt($request->password)]
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


        public function refreshToken() {
                return $this->createNewToken(auth()->refresh());
        }


        public function userProfile() {
                return response()->json(auth()->user());
        }


        protected function createNewToken($token){
                return response()->json([
                    'access_token'  => $token,
                    'token_type'    => 'bearer',
                    'expires_in'    => auth()->factory()->getTTL() * 60,
                    'user'          => auth()->user()
                ]);
        }
}