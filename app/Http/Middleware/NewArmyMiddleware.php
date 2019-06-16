<?php

namespace App\Http\Middleware;

use Closure;

class NewArmyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_object($request->army) && $request->army->registered) {
            return redirect()->route('armies.create');
        }
        return $next($request);
    }
}
