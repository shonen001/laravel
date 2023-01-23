<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\group>
 */
class groupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group'      => fake()->company(),
            'syte'       => fake()->city(),
            'website'    => fake()->domainName(),
            'email'      => fake()->email(),
        ];
    }
}
