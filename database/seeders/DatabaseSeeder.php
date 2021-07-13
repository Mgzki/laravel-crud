<?php

namespace Database\Seeders;



use App\Models\Post;
use App\Models\User;
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
        //Creates a user with every field random except name
        $user = User::factory()->create([
            'name' => 'Max Grodzki',
            'id' => 1,
            'username' => 'mgdzki',
            'email' => 'maxgrodzki@gmail.com',
            'password' => 'password',
            'isAdmin' => 1

        ]);

        //Creates posts and categories with everything random, except the author of the posts
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
