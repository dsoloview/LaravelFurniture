<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::get();

        Article::factory(5)
                    ->hasAttached($tags)
                    ->create();

       Article::factory(2)
                    ->hasAttached($tags->first())
                    ->create();

      Article::factory(2)
                    ->hasAttached($tags->last())
                    ->create();
    }
}
