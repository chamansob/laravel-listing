<?php

namespace Database\Factories;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    public $n=1;
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
            'coach_code'=>   "COOOO".fake()->numberBetween($min = 1, $max = 100),
            'coach_slug' => strtolower(str_replace(' ', '-', $name)),
            'gender' => fake()->randomElement([1, 2]),      
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'website' => fake()->domainName,
            'address' => fake()->address,
            'text' =>  Str::random(10),
            'age' =>  fake()->numberBetween($min = 18, $max = 79),
            'degree' => Str::random(10),
            'price'  => fake()->numberBetween($min = 100, $max = 2000),
            'user_id' => fake()->numberBetween($min = 3, $max = 104),            
            'uploadby' => 1,
            'status' => 0,
        ];
    }
}
