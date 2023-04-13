<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // $this->call(Admin::class);
        $categories = Category::factory(10)->create();
        User::factory(10)->create()->each(function ($user) use ($categories){
            Post::factory(rand(1,5))->create([
                'user_id' => $user->id,
                'category_id' => ($categories->random(1)->first())->id
            ]);
        });
    }
}
