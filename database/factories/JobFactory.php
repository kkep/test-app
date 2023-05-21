<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    private $data = [
        ['name' => 'Chief Accountant', 'department_id' => '1'],
        ['name' => 'accountant', 'department_id' => '1'],
        ['name' => 'Admin', 'department_id' => '2'],
        ['name' => 'director', 'department_id' => '3'],
        ['name' => 'cook', 'department_id' => '4'],
        ['name' => 'Chef', 'department_id' => '4'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            //'department_id' => $this->data[rand(0, count($this->data))][],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
