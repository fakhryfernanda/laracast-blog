<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::create([
        //     'name' => 'Sports',
        //     'slug' => 'sports'
        // ]);

        // Category::create([
        //     'name' => 'Lifestyle',
        //     'slug' => 'lifestyle'
        // ]);

        // Category::create([
        //     'name' => 'Health',
        //     'slug' => 'health'
        // ]);

        // Post::create([
        //     'title' => 'Sports Post',
        //     'slug' => 'sports-post',
        //     'excerpt' => 'this is excerpt.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo ea voluptatem illo ab doloremque excepturi deserunt debitis, in officiis maiores dolore iure odio iste facilis possimus quo iusto quae rerum sapiente aut vero distinctio quidem? Iure ex nesciunt odio delectus nulla consequatur deleniti, debitis, officiis fugiat quis, possimus modi? Esse!',
        //     'category_id' => 1
        // ]);
        
        Category::factory(3)->create();
        Post::factory(10)->create();
    }
}
