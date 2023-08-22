<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $moods = ['very bad', 'bad', 'neutral', 'good', 'very good'];

        return [
            'title' => $this->faker->sentence,
            'mood' => $this->faker->randomElement($moods),
            'body' => $this->faker->paragraph,
            'date' => $this->faker->dateTimeThisMonth,
            'user_id' => User::factory(),
        ];
    }
}
