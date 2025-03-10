<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Response;

// class AuthenticateMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {

//         if(!Session::has('member_id')){
//             return to_route('login');
//         }
//         return $next($request);
//     }
// }

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('member_id')) {
            return to_route('login');
        }

        return $next($request);
    }
}
