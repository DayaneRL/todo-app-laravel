<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{

    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = Auth::user()->role;
        if($userRole !== $role){
            if ($userRole == 'admin')
            {
                return redirect()->route('users.index');
            }
            else if ($userRole == 'user')
            {
                return redirect()->route('dashboard.index');
            }
        }

        return $next($request);
    }
}
