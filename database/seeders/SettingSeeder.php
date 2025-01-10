<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            
        'name'=>'BlogSystem',
        'description'=>'BlogSystem to show and descripe the new teconlogy  and old ',
        'logo'=>'logo.png',
        'facebook'=>'https://www.facebook.com',
        'twiter'=>'https://www.twiter.com',
        'linked_in'=>'https://www.linked_in.com',
        'youtube'=>'https://www.youtube.com',
        'phone'=>'+972595913186',
        'gmail'=>'blogsystem@gmail.com',
        'admin_id'=>1,
        ]);
    }
}
