<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Biography;

class AllInOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory(10)->has(Biography::factory())->create()->each(function ($user) {
            if (rand(0, 1)) {
                $user->update(['role' => 'apiculteur']);
            } else {
                $user->update(['role' => 'apifan']);
            }
        });
        User::where('role', 'apiculteur')->each(function ($apiculteur) {
            Post::factory(5)->create(['user_id' => $apiculteur->id]);
        });
    }
}




