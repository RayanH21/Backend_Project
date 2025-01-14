<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discussion>
 */
class DiscussionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence, // Genereert een willekeurige titel
            'content' => $this->faker->paragraphs(3, true), // Genereert willekeurige inhoud (3 paragrafen)
            'user_id' => User::inRandomOrder()->first()->id, // Koppelt de discussie aan een willekeurige gebruiker
        ];
    }
}
