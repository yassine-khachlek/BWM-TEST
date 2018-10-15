<?php

namespace App\Models;

use App\User as BuiltInUser;

class User extends BuiltInUser
{
    /**
     * Get the posts of the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }

    /**
     * Get the comments of the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }
}
