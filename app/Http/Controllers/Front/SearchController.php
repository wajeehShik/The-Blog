<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        // $tags=Tag::where('name',$request->search)->get();
        // dd($tags);

$search=$request->search;
        $posts=Post::whereStatus('1')->where("title",'like','%'.$search.'%')
        ->orWhere("description",'like','%'.$search.'%')
        ->orWhere("content",'like','%'.$search.'%')->paginate();



        if(count($posts)==0){
            $categoires=Category::where('name','like','%'.$search.'%')->with('posts');
        }
        // $post=Post::whereStatus('1')->with('admin')  ->whereHas('category', function ($query)  use ($request){
            // $query->where('name',);
        // });

    }
}
