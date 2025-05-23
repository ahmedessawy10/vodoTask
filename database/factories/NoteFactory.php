<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(8),
            "content" => fake()->paragraph(4),
            "user_id" => fake()->randomElement(User::pluck('id'))
        ];
    }

    public function withUser($user_id): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => $user_id,
        ]);
    }
}
