<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //   \App\Models\Admin::factory(50)->create();
        //  \App\Models\user::factory(300)->create();
        //  \App\Models\Tag::factory(500)->create();
        //  \App\Models\Faq::factory(10)->create();
        //  \App\Models\Category::factory(1000)->create();
        //  \App\Models\Tag::factory(500)->create();
        $this->call([

            // PermissionTableSeeder::class,
            // CreateAdminsSeeder::class,
        // //     CategoriesSeeder::class,
        // //     FaqsSeeder::class,
        // //     ContactusSeeder::class,
        // //     PagesSeeder::class,
        // //     TagsSeeder::class,
        // //     UsersSeeder::class,
        // //    PostsTableSeeder::class,
        // //    PostTagSeeder::class,
        // //    PostsMediaSeeder::class,
        // // CommentsSeeder::class,
        SettingSeeder::class,
        ]);
    }
}
