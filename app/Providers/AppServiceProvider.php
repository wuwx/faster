<?php

namespace App\Providers;


use App\Laravel\Config;
use Slim\App;

class AppServiceProvider
{
    public function register(App $app)
    {
        date_default_timezone_set(Config::get('app.timezone', 'PRC'));
    }
}
