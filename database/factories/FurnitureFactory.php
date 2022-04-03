<?php

namespace Database\Factories;

use App\Models\FurnitureManufacture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Furniture>
 */
class FurnitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $this->faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));

        return [
            'name' => $this->faker->word(),
            'body' => $this->faker->text($maxNbChars = 300),
            'price' => $this->faker->numberBetween($min = 300000, $max = 600000),
            'old_price' => $this->faker->numberBetween($min = 250000, $max = 200000),
            'salon' => $this->faker->word(),
            'furniture_manufacture_id' => FurnitureManufacture::factory(),
            'width' => $this->faker->numberBetween($min = 100, $max = 400),
            'year' =>  $this->faker->year($max = 'now'),
            'color' =>  $this->faker->colorName(),
            'is_new' =>  $this->faker->boolean(),
        ];
    }
}
