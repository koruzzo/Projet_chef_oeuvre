<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Biography;
use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $biographies = Biography::all();

        foreach ($biographies as $biography) {
            $numberOfUsers = rand(1, $users->count());
            $usersToGivePoints = $users->random($numberOfUsers);

            foreach ($usersToGivePoints as $user) {
                if (!$user->hasGivenPoint($biography)) {
                    Point::create([
                        'user_id' => $user->id,
                        'biography_id' => $biography->id,
                    ]);
                }
            }
        }
    }
}
