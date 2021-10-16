<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->hasRole();
            if ($role === 'user') {
                return $next($request);
            }
            else{
                return redirect()->route('admin-dashboard');
            }
        
    }
}
