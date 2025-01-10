<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Contactus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;

class ContactusSeeder extends Seeder
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
        for ($i = 0; $i < 30; $i++) {
            $title = $faker->sentence(mt_rand(1, 3), true);
            $cats[] = [
                'name'         => $title,
                'email'    =>$faker->email(),
                'subject'   => $faker->sentence(mt_rand(2, 10), true),
                'message'   => $faker->sentence(mt_rand(15, 30), true),
            ];
        }

        $chunks = array_chunk($cats, 100);
        foreach ($chunks as $chunk) {
            Contactus::insert($chunk);
        }
    }
}
