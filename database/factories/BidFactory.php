<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'offer' =>  $this->faker->randomDigitNot(0)*10,
            'days' => $this->faker->randomDigitNot(0),
            'message' =>  $this->faker->text(500),
            'bidstatus_id' => random_int(1,3),
            'user_id' => random_int(3,12),
            'job_id' => random_int(1,10),
        ];
    }
}
