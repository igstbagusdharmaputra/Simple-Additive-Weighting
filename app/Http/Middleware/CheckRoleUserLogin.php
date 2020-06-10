<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRoleUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$roles)
    {
        $user_role = Auth::user()->roles;
        foreach (explode('|', $roles) as $role) {
            if($user_role == $role)
                return $next($request);
        }

        return abort(404);
    }
}
