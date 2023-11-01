<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleryVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->code !== $request->get('code')) {
            return back()->with('error', 'Anda harus login untuk melihat galeri ini.');
        }
    
        return $next($request);
    }
}
