<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Config>
 */
class ConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "seller_idv" => "taip",
            "seller_name" => fake()->name,
            "seller_code" => fake()->postcode,
            "invoice_series_deb" => fake()->numberBetween(1,100),
            "invoice_series_cre" => fake()->numberBetween(1,100),
            "invoice_series_pre" => fake()->numberBetween(1,100),
        ];
    }
}
