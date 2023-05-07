<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Layout of application
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layout.app');
    }
}
