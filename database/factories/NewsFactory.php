<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeBetween('-15 days', '1 days'),
            'updated_at' => $this->faker->dateTimeBetween('-14 days', '1 days'),
        ];
    }
}
