<?php

namespace App\Http\Middleware;

use Auth;
use Roles;
use Closure;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(!$user->hasPermission('access')){   
            return response()->json('Forbidden', 403);
        }
        return $next($request);
    }
}
