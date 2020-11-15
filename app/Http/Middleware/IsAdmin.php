<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class IsAdmin
{
        private $auth;

        
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle(Request $request, Closure $next) {
                $this->auth = auth()->user() ? (strpos(auth()->user()->roles, 'admin') !== false) : false;

                if ($this->auth !== true) {
                    return response()->json(['status' => 'This user doesn\'t have Admin rights!'], 401);
                }

                return $next($request);
        }
}
