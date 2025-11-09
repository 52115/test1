<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail(),
            'tel1' => $this->faker->numberBetween(80, 90),
            'tel2' => $this->faker->numberBetween(1000, 9999),
            'tel3' => $this->faker->numberBetween(1000, 9999),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->word(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'detail' => $this->faker->realText(50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
