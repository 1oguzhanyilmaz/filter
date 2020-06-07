<?php

namespace Oy\Providers;

use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{

    public function register()
    {
        $queryFiilter = $this->app->make('Oy\Base\QueryFilters');
    }

    public function boot()
    {
        // boot method...
        // echo '>>> BOOT';
    }
}
