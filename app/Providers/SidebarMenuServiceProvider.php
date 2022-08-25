<?php

namespace App\Providers;

use App\Http\ViewComposers\SidebarMenuViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SidebarMenuServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer('components.sidebar-menu', SidebarMenuViewComposer::class);
    }
}
