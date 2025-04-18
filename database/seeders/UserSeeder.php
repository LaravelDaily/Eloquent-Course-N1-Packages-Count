<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)
            ->create()
            ->each(function($user) {
                $user->addMediaFromDisk('avatar_images/' . random_int(1, 3) . '.jpg', 'local')
                    ->preservingOriginal()
                    ->toMediaCollection('avatars');

                Post::factory(rand(1,10))->create(['user_id' => $user->id]);
            });
    }
}
