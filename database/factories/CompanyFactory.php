<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'      => $this->faker->uuid,
            'name' => $this->faker->company(),
            'address'       => $this->faker->address,
            // 'valid'         => $this->faker->boolean(),
        ];
    }
}
