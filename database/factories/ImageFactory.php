<?php

namespace Database\Factories;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
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
        $image = $faker->loremSpace('furniture', 'public/storage/images/', 640, 480, false);
        $imageFile = new File($image);

        return [
            'image' => 'images/'.$faker->loremSpace('furniture', 'public/storage/images', 640, 480, false),
        ];
    }
}
