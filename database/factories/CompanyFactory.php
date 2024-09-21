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
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'linkedin'  => 'https://www.linkedin.com/in/' . $this->faker->userName,
            'twitter'   => 'https://x.com/' . $this->faker->userName,
            'instagram' => 'https://instagram.com' . $this->faker->userName,
            'tags' => $tags
        ];
    }
}
