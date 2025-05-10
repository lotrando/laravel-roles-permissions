<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($locale = $request->get('lang')) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        } elseif (session('locale')) {
            app()->setLocale(session('locale'));
        }
        return $next($request);
    }
}
