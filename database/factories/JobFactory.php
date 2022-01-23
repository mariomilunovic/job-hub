<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(800),
            'days' => $this->faker->randomDigitNot(0),
            'reward' =>  $this->faker->randomDigitNot(0)*10,
            'rating' => $this->faker->randomDigitNot(0),
            'user_id' => random_int(1,14),
            'status_id' => 1,
        ];
    }
}
