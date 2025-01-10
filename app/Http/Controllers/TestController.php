<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
return view('test');
        /***
         *     $posts = App\Models\Post::with('tags')->get();
    foreach($posts as $post){
        echo '<pre>';
        print_r($post->tags);
        echo '</pre>';
    }
         */
    }
}
