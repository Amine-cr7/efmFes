<?php

namespace App\Http\Middleware;

use App\Models\Apprenti;
use App\Models\Artisan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InterditMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Artisan::count() != 0 and Apprenti::count() != 0 ){
            return $next($request);
        }
        return redirect('/apprentis');
    }
}
