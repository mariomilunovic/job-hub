<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company.' Bank',
            'account_number' => $this->faker->numerify('###-#############-##'),
            'account_owner_name' =>  $this->faker->firstName.' '.$this->faker->lastName,
            'account_owner_address' => $this->faker->address,
            'user_id'  => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
