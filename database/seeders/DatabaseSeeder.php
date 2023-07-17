<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory(1)->create();

        // Category::create([
        //     'name' => 'Places',
        //     'slug' => 'places'
        // ]);
        // Category::create([
        //     'name' => 'Food',
        //     'slug' => 'food'
        // ]);
        // Category::create([
        //     'name' => 'Travel',
        //     'slug' => 'travel'
        // ]);
        // Category::create([
        //     'name' => 'Culture',
        //     'slug'=>'Culture'
        // ]);

        // Blog::factory(2)->create(['category_id'=> 1, 'user_id'=>1 ]);
        // Blog::factory(3)->create(['category_id'=> 1, 'user_id'=>2 ]);
        // Blog::factory(3)->create(['category_id'=> 2, 'user_id'=>1 ]);
        // Blog::factory(2)->create(['category_id'=> 2, 'user_id'=>2 ]);
        // Blog::factory(1)->create(['category_id'=> 3, 'user_id'=>1 ]);
        // Blog::factory(2)->create(['category_id'=> 3, 'user_id'=>2 ]);
        Comment::factory(4)->create();




        \App\Models\User::factory()->create([
            'name' => 'Thae Nandar Soe',
            'email' => 'thaenandarsoe.2201@gmail.com',
            'username' => 'thaenandarsoe',
            'is_Admin'=>1,
        ]);


    }
}
