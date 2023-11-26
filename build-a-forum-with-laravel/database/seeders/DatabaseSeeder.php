<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)->create();

        $posts = \App\Models\Post::factory(100)->recycle($users)->create();
        $comments = \App\Models\Comment::factory(100)->recycle($users)->recycle($posts)->create();

        \App\Models\User::factory()
            ->has(Post::factory(10))
            ->has(Comment::factory(20)->recycle($posts))
            ->create([
                'name' => 'Tuantq',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => hash('sha256', '12341234'),
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'current_team_id' => null,
            ]);
    }
}
