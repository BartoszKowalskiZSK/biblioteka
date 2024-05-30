<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Privillages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$privillages)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $userPrivillages = Auth::user()->privillages;

        foreach ($privillages as $privillage) {
            if ($userPrivillages >= $privillage) {
                return $next($request);
            }
        }

        abort(403);
    }
}