<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = Auth::user()->role;
        if($userRole !== $role){
            return redirect(UserService::getRouteUserRole($userRole));
        }

        return $next($request);
    }
}
