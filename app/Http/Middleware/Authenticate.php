<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
        public function handle($request, Closure $next, ...$guards) {
                try {
                    if (!$user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json(['status' => 'User not found'], 404);
                    }
                } 
                catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['status' => 'Authentication Token is Expired'], 401);
                } 
                catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['status' => 'Authentication Token is Invalid'], 401);
                } 
                catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['status' => 'Authorization Token not found'], 401);
                }

                return $next($request);
        }
}
