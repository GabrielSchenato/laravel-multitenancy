<?php

namespace App\Auth;

use App\Models\Admin;
use Illuminate\Auth\EloquentUserProvider;

class AdminProvider extends EloquentUserProvider
{
    use UserProvider;

    public static function userOrNull($user)
    {
        return $user && $user->containsType(Admin::class) ? $user : null;
    }
}
