<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $posts=Post::where('comment_able','1')->get();
        $comment = $faker->sentence(mt_rand(10, 20), true);

        foreach($posts as $post){
            for($i=0;$i<rand(3,10);$i++){
                Comment::create([
                    'comment'=>$comment,
                    'name'=>$faker->name,
                    'email'=>$faker->email,
                    'status'=>'1',
                    'post_id'=>$post->id,
                ]);
            }
        }
    }
}
