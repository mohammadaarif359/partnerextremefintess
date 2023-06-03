<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

use Closure;

class CheckRoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $allowedRoles = Role::pluck('name')->toArray();
		if(Auth::check()) {
			foreach($allowedRoles as $allow) {
				if(Auth::user()->hasRole($allow) && in_array($allow,$roles)) {
					return $next($request);
				}	
			}
        }
        return redirect('/login');
    }
}