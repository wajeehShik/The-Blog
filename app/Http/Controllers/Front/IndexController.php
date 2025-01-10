<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
class IndexController extends Controller
{
    public function index(){
        $posts=Post::whereStatus('1')->orderBy('id','desc')->with("category",'admin')->paginate(5);
        return view("welcome",compact('posts'));
    }
}
