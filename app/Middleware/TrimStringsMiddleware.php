<?php

namespace App\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Handlers\Strategies\RequestHandler;
use Slim\Routing\RouteContext;
use Tightenco\Collect\Support\Collection;

class TrimStringsMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $parameters = Collection::make($request->getQueryParams())->map(function ($val, $key) {

           return trim($val);
        })->all();


        return  $handler->handle($request->withQueryParams($parameters));
    }
}