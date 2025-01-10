<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\View\Component;

class FrontLayout extends Component
{
    public $title;
    public $user;
    public $categories;
    public $setting;
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public function __construct($title = null)
     {
        
        $this->title=$title??config('app.name');
        $this->categories=Category::whereHas("posts")->whereStatus('1')->take(5)->select(['name','slug'])->get();
        $this->user=$this->isLoginUser();
        $this->setting=Setting::first();
 
        //
    }

    private function isLoginUser(){
        $user=null;
        $guard=['admin','web'];
        for($i=0;$i<2;$i++){
            if(auth()->guard($guard[$i])->check()){
                $user=auth()->guard($guard[$i])->user();
                return $user;
                break;
            }
        }
        return $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.front-layout');
    }
}
