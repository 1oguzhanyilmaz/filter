<?php

namespace Oy\Providers;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{

    public function register()
    {
        echo 'register func';
        echo '<br>';
    }

    public function boot()
    {
        echo 'boot func';
        echo '<br>';
    }
}
