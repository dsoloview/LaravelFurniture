<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Mmo\Faker\LoremSpaceProvider($faker));

        return [
            'slug' => $this->faker->uuid(),
            'title' => $this->faker->text($minNbChars = 5, $maxNbChars = 40, $indexSize = 2),
            'description' => $this->faker->text($maxNbChars = 150, $indexSize = 2),
            'body' =>  $this->faker->text($maxNbChars = 1500, $indexSize = 2),
            'image_id' => Image::factory(),
            'published_at' =>  $this->faker->date(),
        ];
    }
}
