<?php

namespace Database\Seeders;

use App\Models\Furniture;
use App\Models\FurnitureManufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TagSeeder::class,
            CategorySeeder::class,
            ArticleTableSeeder::class,
            FurnitureManufactureSeeder::class,
            FurnitureSeeder::class,
            BannerSeeder::class,
        ]);
    }
}
