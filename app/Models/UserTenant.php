<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTenant extends Model
{
    public static function createUser(array $attributes)
    {
        $admin = self::create([]);
        $admin->user()->create($attributes['user']);
        return $admin;
    }
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
