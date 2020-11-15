<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Http\Resources\AuthLogin as AuthLoginResource;


class AdminAuthController extends Controller
{
        public function __construct() {
                $this->middleware('auth:api', ['except' => ['register', 'login', 'refreshToken']]);
                $this->middleware('is_admin:api', ['only' => ['adminProfile']]);
        }


        public function register(Request $request) {
                $validator = Validator::make($request->all(), [
                    'username'   => 'required|string|between:2,100',
                    'password'   => 'required|string|confirmed|min:6',
                    'email'      => 'required|string|email|max:100|unique:users',
                    'first_name' => 'required|string|between:2,100',
                    'last_name'  => 'required|string|between:2,100',
                    'roles'      => 'required|string'
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

                // Check for Admin role:
                $this->auth = auth()->user() ? (strpos(auth()->user()->roles, 'admin') !== false) : false;

                if ($this->auth !== true) {
                    return response()->json(['error' => 'This user doesn\'t have Admin rights!'], 401);
                }

                return $this->createNewToken($token);
        }


        public function logout() {
                auth()->logout();

                return response()->json(['message' => 'User successfully signed out']);
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


        public function adminProfile() {
                return response()->json(auth()->user());
        }


        protected function createNewToken($token){
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


}
