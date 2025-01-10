<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contactus;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    //
    public function index()
    {
        $admins=Admin::count();
        $categories=Category::count();
        $comments=Comment::count();
        $contactuss=Contactus::count();
        $pages=Page::count();
        $posts=Post::count();
        $tags=Tag::count();
        $users=User::count();
        $faqs=Faq::count();
        return view('dashboard',compact('faqs','admins','categories','comments','contactuss','pages','posts','tags','users'));
    }
}
