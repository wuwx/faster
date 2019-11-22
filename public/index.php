<?php

require __DIR__ . '/../vendor/autoload.php';

define('ROOT_PATH', realpath(__DIR__ . '/../'));

// 使用 ID 依赖控制容器，为了在控制器中能够注入参数
$app = \DI\Bridge\Slim\Bridge::create();

$provides = [
    \App\Providers\ErrorExceptionServiceProvider::class,
    \App\Providers\ConfigServiceProvider::class,
    \App\Providers\AppServiceProvider::class,
    \App\Providers\MiddlewareServiceProvider::class,
    \App\Providers\RouteServiceProvider::class,
];

\Tightenco\Collect\Support\Collection::make($provides)->map(function ($className) use ($app) {
    
    $app->getContainer()->get($className)->register($app);
});


// Run app
$app->run();