<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = Category::get();
        $name = $this->faker->sentence();
        $slug = Str::slug($name, '-');

        return [
            'name' => $name,
            'slug' => $slug,
            'sort' => $this->faker->numberBetween(1, 100),
            'parent_id' =>  $this->faker->numberBetween(0, 1) === 0 ? null : $categories->random(),
        ];
    }
}
