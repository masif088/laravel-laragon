<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ArgonLayout extends Component
{
    public $sidebars;

    public function __construct()
    {
        $this->sidebars = [
            ['title' => 'Dashboard', 'header' => true],
            ['title' => 'Dashboard', 'icon' => 'fa-solid fa-circle-question', 'icon-color' => 'text-emerald-400', 'link' => 'http://google.com'],
            ['title' => 'Dashboard', 'icon' => 'fa-solid fa-circle-question', 'icon-color' => 'text-emerald-400', 'link' => 'http://google.com'],
            ['title' => 'Dashboard', 'header' => true],
        ];
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.argon');
    }
}
