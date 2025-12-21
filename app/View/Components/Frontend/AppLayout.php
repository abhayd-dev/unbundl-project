<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function render(): View
    {
        return view('frontend.layouts.app');
    }
}
