<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\furnitureManufacture>
 */
class FurnitureManufactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public $manufacture = ['first', 'second', 'third', 'fourth'];

        public function definition()
    {
        return [
            'name' => $this->manufacture[array_rand($this->manufacture)],
        ];
    }
}
