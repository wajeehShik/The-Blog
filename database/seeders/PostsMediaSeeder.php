<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostMedia;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class PostsMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image='default.png';
        $posts = Post::all();
        foreach($posts as $post){
            for($i=0;$i<mt_rand(1,3);$i++){
                PostMedia::create([
        'post_id'=>$post->id,
        'file_name'=>'default.png',
        'file_type'=>'test',
        'file_size'=>'200k',
                ]);
    }}
    }
}
