<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Мягкая мебель',
                'slug' => Str::slug('Мягкая мебель'),
                'sort' => 1,
                'children' => [
                    [
                        'name' => 'Кресла',
                        'slug' => Str::slug('Кресла'),
                        'parent_id' => 1,
                        'sort' => 6
                    ],
                    [
                        'name' => 'Диваны',
                        'slug' => Str::slug('Диваны'),
                        'sort' => 7
                    ],
                    [
                        'name' => 'Пуфы',
                        'slug' => Str::slug('Пуфы'),
                        'sort' => 8
                    ],
                    [
                        'name' => 'Купе',
                        'slug' => Str::slug('Купе'),
                        'sort' => 9
                    ],
                ]
            ],
            [
                'name' => 'Кухня',
                'slug' => Str::slug('Кухня'),
                'sort' => 2,
                'children' => [
                    [
                        'name' => 'Стулья',
                        'slug' => Str::slug('Стулья'),
                        'sort' => 11
                    ],
                    [
                        'name' => 'Табуреты',
                        'slug' => Str::slug('Табуреты'),
                        'sort' => 12
                    ],
                    [
                        'name' => 'Гарнитур',
                        'slug' => Str::slug('Гарнитур'),
                        'sort' => 13
                    ]
                ]
            ],
            [
                'name' => 'Кровати',
                'slug' => Str::slug('Кровати'),
                'sort' => 3
            ],
        ];
        foreach ($categories as $category) {
            $parent = Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'sort' => $category['sort'],
            ]);
            if (!empty($category['children'])) {
                foreach ($category['children'] as $child) {
                    \App\Models\Category::create([
                        'name' => $child['name'],
                        'slug' => $child['slug'],
                        'sort' => $child['sort'],
                        'parent_id' => $parent->id
                    ]);
                }
            }
        }
    }
}
