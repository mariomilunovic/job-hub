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
            'message' =>  $this->faker->text(400),
            'bidstatus_id' => 1,
            'user_id' => random_int(3,12),
            'job_id' => random_int(1,10),
        ];
    }
}
