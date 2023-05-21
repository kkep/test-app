<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{

    private $data = [
        ['name' => 'accounting department'],
        ['name' => 'administrative staff'],
        ['name' => 'board of directors'],
        ['name' => 'catering'],
        ['name' => 'chairman'],
        ['name' => 'finance department'],
        ['name' => 'finance department'],
        ['name' => 'IT department'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->data[rand(1, count($this->data)) - 1]['name'],
        ];
    }

    public function unverified(): static
    {
    }
}
