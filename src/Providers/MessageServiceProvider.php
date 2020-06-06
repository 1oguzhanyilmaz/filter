<?php

namespace Oy\Providers;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{

    public function register()
    {
        echo 'register func';
    }

    public function boot()
    {
        echo 'boot func';
    }
}
