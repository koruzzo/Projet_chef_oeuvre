<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Biography;

class BiographyPolicy
{
    public function isThatYourBiography(User $user, Biography $biography)
    {
        return $user->where('role', 'admin')->orWhere('role', 'apiculteur')->exists()
        || $user->id === $biography->user_id;
    }
}

