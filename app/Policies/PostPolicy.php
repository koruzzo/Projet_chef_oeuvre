<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function isThatYourPost(User $user, Post $post)
    {
        return $user->where('role', 'admin')->orWhere('role', 'apiculteur')->exists()
            || $user->id === $post->user_id;
    } 
}

