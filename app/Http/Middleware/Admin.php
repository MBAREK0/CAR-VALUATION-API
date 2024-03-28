<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user() ;
        $role = $user->role;
        if ($role == "admin") {
            return $next($request);
        }
        return response()->json([
            'message'=> 'Unauthenticated'
        ],401);

    }
}
