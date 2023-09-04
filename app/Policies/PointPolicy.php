<?php

namespace App\Policies;

use App\Models\Point;
use App\Models\User;

class PointPolicy
{
    public function isThatYourPoint(User $user, Point $point)
    {
        return $user->id === $point->user_id;
    } 
}
