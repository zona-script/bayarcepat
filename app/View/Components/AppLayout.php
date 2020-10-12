<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function render()
    {
        if (request()->is('dashboard/*')){
            return view('layouts.dashboard');
        }
        elseif (request()->is('admin/*')){
            return view('layouts.admin');
        }
        elseif (request()->is('api-docs*')){
            return view('layouts.apidocs');
        }

        return view('layouts.app');
    }
}
