<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $cats = [];
        $admin = collect(Admin::get()->modelKeys());
        for ($i = 0; $i <20; $i++) {

            $title = $faker->sentence(mt_rand(1, 2), true);
            $cats[] = [
                'name'         => $title,
                'slug'          => Str::slug($title).(string)rand(0,1000000000000000),
                'image'=>"default.png",
                'status'   => '1',
                'admin_id'       => $admin->random(),
            ];
        }

        $chunks = array_chunk($cats, 100);
        foreach ($chunks as $chunk) {
            Category::insert($chunk);
        }
    }
}
