<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpResponseException;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if ($jwt = $request->cookie('jwt')) {
            $request->headers->set('Authorization', 'Bearer ' . $jwt);
        };


        try {
            $this->authenticate($request, $guards);
        } catch (AuthenticationException $e) {
            // Handle unauthenticated request
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
