<?php

namespace Orquestra\Http\ViewComposers\Admin;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;

class GeneralComposer
{
    public function __construct()
    {
    }
    
    public function compose(View $view)
    {
        $view->with('STATIC_URL', env('APP_URL') . '/static/admin');
    }
}