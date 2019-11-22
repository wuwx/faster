<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response) {
   
    dd($request->getQueryParams());
   $response->getBody()->write('hello, world');
   return $response;
});