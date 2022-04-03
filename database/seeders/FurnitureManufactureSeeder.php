<?php

namespace Database\Seeders;

use App\Models\FurnitureManufacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FurnitureManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacture = ['first', 'second', 'third', 'fourth'];

        foreach ($manufacture as $name) {
            FurnitureManufacture::create(compact('name'));
        }
    }
}
