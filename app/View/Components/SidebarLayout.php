<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\Component;

class SidebarLayout extends Component
{
    public $categories;
    public $posts;
    public $comments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories=Category::whereHas('posts')->whereStatus('1')->take(7)->get();    
        $this->posts=Post::orderBy('id','desc')->whereStatus('1')->take(5)->get();
        $this->comments=Comment::orderBy('id','desc')->whereStatus('1')->take(5)->get();
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-layout');
    }
}
