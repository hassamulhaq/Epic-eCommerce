<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class FlashServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        Flash::levels([
            'info' => 'alert-info absolute bottom-0 right-0 mr-4',
            'danger' => 'alert-danger absolute bottom-0 right-0 mr-4',
            'success' => 'alert-success absolute bottom-0 right-0 mr-4',
            'warning' => 'alert-warning absolute bottom-0 right-0 mr-4',
            'dark' => 'alert-dark absolute bottom-0 right-0 mr-4',
        ]);
    }
}
