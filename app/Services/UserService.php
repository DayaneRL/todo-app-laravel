<?php

namespace App\Services;

class UserService{
    public static function getRouteUserRole($userRole){
        if ($userRole == 'admin')
        {
            return route('users.index');
        }
        else if ($userRole == 'user')
        {
            return route('dashboard.index');
        }
    }
}

?>
