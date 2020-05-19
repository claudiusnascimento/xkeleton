<?php

use Illuminate\Database\Seeder;
use App\Models\PostCategory;
use App\Models\Post;

class BlogTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::transaction(function () {

            factory(PostCategory::class, 5)->create()->each(function($category) {

                $posts = factory(Post::class, 4)->create();

                $category->posts()->sync($posts->pluck('id')->toArray());

            });

        });
    }
}
