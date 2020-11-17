<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
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
        User::factory(10)->create();
        Post::factory(100)->create();
        Category::factory(10)->create();
        Tag::factory(50)->create();

        $this->call(RoleSeeder::class);

        Post::all()->each(function ($post) {
            $post->category()->attach(Category::inRandomOrder()->first()->id);
            $post->tag()->attach(Tag::inRandomOrder()->first()->id);
        });

        User::all()->each(function ($user) {
           $user->roles()->attach(Role::inRandomOrder()->first()->id);
        });

    }
}
