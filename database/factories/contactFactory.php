<?php

namespace Database\Factories;
use App\Models\group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\contact>
 */
class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName'=> $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'phone'    => $this->faker->phonenumber(),
            'email'    => $this->faker->email(),
            'address'  => $this->faker->address(),
            'idgroup'  => group::inRandomOrder()->first()
        ];
    }
}
