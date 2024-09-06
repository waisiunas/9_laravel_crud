<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $continents = [
            "Asia",
            "Africa",
            "North America",
            "South America",
            "Antarctica",
            "Europe",
            "Australia",
        ];
        return [
            'name' => fake()->country(),
            'capital' => fake()->city(),
            'currency' => fake()->currencyCode(),
            'continent' => fake()->randomElement($continents),
        ];
    }
}
