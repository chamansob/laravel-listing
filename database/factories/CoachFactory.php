<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        return [           
            'name' => $name,
            'coach_slug' => strtolower(str_replace(' ', '-', $name)),
            'gender' => fake()->numberBetween($min = 1, $max = 2),      
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'website' => fake()->domainName,
            'address' => fake()->address,
            'text' =>  Str::random(10),
            'age' =>  fake()->numberBetween($min = 18, $max = 79),
            'degree' => Str::random(10),
            'price'=>fake()->randomDigit,
            'status' => 0,
        ];
    }
}
