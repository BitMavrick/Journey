<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpResponseException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (!$request->expectsJson()) {
        //     // return route('login');

        //     // I want to send a json response from here
        //     return response()->json(['error' => 'Unauthenticated'], 401);
        // }
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
