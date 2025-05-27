<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'You must log in first');
        }

        return $next($request);
    }


    protected $routeMiddleware = [
    // other middlewares...
    'authcheck' => \App\Http\Middleware\AuthCheck::class,
];

}
