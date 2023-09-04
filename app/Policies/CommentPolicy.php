<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    public function isThatYourComment(User $user, Comment $comment)
    {
        return $user->where('role', 'admin')->orWhere('role', 'apiculteur')->exists()
            || $user->id === $comment->user_id;
    }
}
