<?php

namespace Database\Factories;

use App\Models\MjuStudent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [

                'student_code' => fake()->unique()->regexify('[A-Z0-9]{15}'),
                'first_name' => fake('th_TH')->firstName,
                'last_name' => fake('th_TH')->lastName,
                'first_name_en' => fake()->firstName,
                'last_name_en' => fake()->firstName,
                'major_id' => fake()->numberBetween(1, 5),
                'idcard' => fake()->randomNumber(5),
                'birthdate' => fake()->dateTime(),
                'gender' => fake()->randomElement(['M', 'F']),
                'address' => fake()->address,
                'phone' => fake()->phoneNumber(),
                'email' => Str::random(10).'@example.com',
                'created_at' => fake()->dateTime(),
                'updated_at' => fake()->dateTime(),

        ];


    }
}

