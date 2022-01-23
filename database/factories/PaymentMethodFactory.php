<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->creditCardType,
            'card_number' => $this->faker->creditCardNumber,
            'name_on_card' =>  $this->faker->firstName.' '.$this->faker->lastName,
            'exp_month' => $this->faker->month,
            'exp_year' => $this->faker->numberBetween($min = 2022, $max = 2027),
            'cvc' => $this->faker->numberBetween($min = 000, $max = 999),
            'user_id'  => $this->faker->numberBetween($min = 1, $max = 14),
        ];
    }
}
