<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Str;
class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $faqs = [];
        $admin = collect(Admin::get()->modelKeys());
        for ($i = 0; $i < 50; $i++) {

            $title = $faker->sentence(mt_rand(2, 5), true);
            $faqs[] = [
                'title'         => $title,
                'body'=>$faker->sentence(mt_rand(30, 100), true),
                'status'   => '1',
                'admin_id'       => $admin->random(),
            ];
        }
        $chunks = array_chunk($faqs, 500);
        foreach ($chunks as $chunk) {
            Faq::insert($chunk);
        }
        
    }
}
