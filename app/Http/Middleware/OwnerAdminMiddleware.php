<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerAdminMiddleware
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
        // $role = Auth::user()->role;
        $role = Auth::guard('admin')->user()->role->name;
        if ($role == 'owner' || $role == 'senior-admin'){
            return $next($request);
        }

        return redirect()->back();

    }
}
