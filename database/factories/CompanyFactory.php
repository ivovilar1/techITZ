<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    public function definition(): array
    {
        $tags = ['Front','Back', 'Mobile'];
        return [
            'cnpj' => $this->faker->unique()->randomNumber(8, true),
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'tags' => $tags
        ];
    }
}
