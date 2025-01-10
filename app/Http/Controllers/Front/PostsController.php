<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Stevebauman\Purify\Facades\Purify;

class PostsController extends Controller
{
    //
    public function show($slug){
        $post=Post::whereSlug($slug)->with('admin','category','tags','comments')->withCount('comments')->firstOrFail();
       return view("front.post",compact('post'));
    }

    public function category($slug){
        $category=Category::whereSlug($slug)->select('id')->first();
        $posts=Post::where("category_id",$category->id)->paginate(7);
        return view('welcome',compact('posts'));
        
    }
    public function add_comment(CommentRequest $request){
        $post=Post::whereSlug($request->post('slug'))->select('id','slug')->firstOrFail();
       Comment::create([
            'post_id'=>$post->id,
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'comment'=> Purify::clean($request->post('comment')),
        ]);
        alert()->success('تعليق', 'تم اضافة تعليق بنجاح');
        return redirect()->route('front.post.show',['slug'=>$post->slug]);

    }
}
