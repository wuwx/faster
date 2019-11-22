<?php

namespace App\Providers;

use App\Laravel\Config;
use Slim\App;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Tightenco\Collect\Support\Collection;

class ConfigServiceProvider
{
    public function register(App $app)
    {
        $basePath = ROOT_PATH;
        
        (new Dotenv)->load($basePath . '/.env');
        
        new Config;
    
        Collection::make((new Finder())->in($basePath . '/config')->files())->map(function (SplFileInfo $file) {
        
            $fileKey = $file->getBasename('.php');
    
            Config::set($fileKey, require $file->getRealPath());
        });
    }
}
