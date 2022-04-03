<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Furniture;
use App\Models\FurnitureManufacture;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacture = FurnitureManufacture::get();
        $categories = Category::get();

        Furniture::factory(20)->hasAttached(
            Image::factory()->count(rand(1, 4))
        )
            ->sequence(function () use ($manufacture, $categories) {
                return [
                    'furniture_manufacture_id' => $manufacture->random(),
                    'furniture_category_id' => $categories->random(),
                ];
            })
            ->create();
    }
}
