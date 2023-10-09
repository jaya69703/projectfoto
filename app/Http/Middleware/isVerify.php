<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the user's 'isverify' value is 1
            if (auth()->user()->isverify == 1) {
                return $next($request);
            }
        }

        // If not verified or not authenticated, redirect
        return redirect()->route('errors.verify');
    }
}
