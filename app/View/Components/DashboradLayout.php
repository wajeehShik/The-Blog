<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboradLayout extends Component
{
    public $title;
    public $user;
    public $url;
    public $head;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title=null)
    {
        $this->title=$title;
        $this->user=auth()->guard('admin')->user();
        $this->url=request()->route()->uri??"";
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.dashborad.app');
    }
}
