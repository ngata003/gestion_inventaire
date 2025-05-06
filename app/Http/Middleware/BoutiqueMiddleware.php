<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;
use Symfony\Component\HttpFoundation\Response;

class BoutiqueMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('boutique_active')) {
            View::share('boutique_active', Session::get('boutique_active'));
        }
        return $next($request);
    }
}
