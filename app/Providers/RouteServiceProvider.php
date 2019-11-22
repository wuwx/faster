<?php

namespace App\Providers;

use Slim\App;

class RouteServiceProvider
{
    public function register(App $app)
    {
        require ROOT_PATH . '/routes/api.php';
    }
}
