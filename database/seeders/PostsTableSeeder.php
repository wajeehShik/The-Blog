<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $posts = [];
        $categories =  Category::whereStatus('1')->pluck('id');
        $admin = collect(Admin::get()->modelKeys());
        for ($i = 0; $i < 1000; $i++) {
            $days = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'];
            $months = ['01', '02', '03', '04', '05', '06', '07', '08'];
            $post_date = "2023-" . Arr::random($months) . "-" . Arr::random($days) . " 01:01:01";
            $post_title = $faker->sentence(mt_rand(3, 6), true);
            $posts[] = [
                'title'         => $post_title,
                'image'=>"default.png",
                'slug'          => Str::slug($post_title),
                'description'   => $faker->paragraph(),
                'content'   => $faker->paragraph(),
                'admin_id'       => $admin->random(),
                'category_id'   => $categories->random(),
                'created_at'    => $post_date,
                'updated_at'    => $post_date,
            ];
        }

        $chunks = array_chunk($posts, 500);
        foreach ($chunks as $chunk) {
            Post::insert($chunk);
        }
        //
    }
}
