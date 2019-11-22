<?php

require __DIR__ . '/../vendor/autoload.php';

// 使用 ID 依赖控制容器，为了在控制器中能够注入参数
$app = \DI\Bridge\Slim\Bridge::create();


$errorMiddleware = $app->addErrorMiddleware(true, true, true);


// Run app
$app->run();