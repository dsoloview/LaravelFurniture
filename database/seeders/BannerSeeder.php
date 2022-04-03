<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Sequence;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'images/test_banner_1.jpg',
            'images/test_banner_2.jpg',
            'images/test_banner_3.jpg',
        ];
        Banner::factory()->count(3)->create(
            [
                'image_id' => Image::factory()->state(new Sequence(
                    ['image' => $images[0]],
                    ['image' => $images[1]],
                    ['image' => $images[2]],
                ))
            ]
        );
    }
}
