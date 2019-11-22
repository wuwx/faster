<?php

namespace App\Providers;


use App\Laravel\Config;
use Psr\Http\Server\MiddlewareInterface;
use Slim\App;
use Tightenco\Collect\Support\Collection;

class MiddlewareServiceProvider
{
    public function register(App $app)
    {
        Collection::make(Config::get('middleware'))->map(function ($className) use ($app) {
    
            if (class_implements($className, MiddlewareInterface::class)) {
        
                $app->addMiddleware($app->getContainer()->get($className));
            } else {
        
                $app->add($className);
            }
        });
    }
}
