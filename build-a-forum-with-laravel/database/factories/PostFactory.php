<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = str(fake()->sentence)->beforeLast('.')->title();
        return [
            'user_id' => User::factory(),
            'title' => $title,
            'body' => fake()->realText(600),
            'slug' => Str::slug($title)
        ];
    }
}
