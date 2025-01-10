<?php
namespace Database\Seeders;
use Illuminate\Support\Str;

use App\Models\Admin;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory;


class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $tags = [];
        $admin = Admin::where('status','1')->inRandomOrder()->first()->id;
       
        for ($i = 0; $i < 100; $i++) {
            $title = $faker->sentence(mt_rand(1, 2), true);
          
            $tags[] = [
                'name'         => $title,
                'slug'          => Str::slug($title).(string)rand(0,1000000000000000),
                'status'   => (string   )rand(0, 1),
                'admin_id'        => $admin,
            ];
        }  $chunks = array_chunk($tags, 500);
        foreach ($chunks as $chunk) {
            Tag::insert($chunk);
        }
    }
}
