<?php

namespace App\Laravel;

use Tightenco\Collect\Support\Collection;

class Config
{
    /**
     * @var Config
     */
    private static $instance;
    /**
     * @var Collection
     */
    private $store;
    
    public function __construct()
    {
        self::$instance = $this;
        $this->store = new Collection();
    }
    
    public static function get($key, $default = null)
    {
        return self::$instance->store->get($key, $default);
    }
    
    public static function set($key, $val)
    {
        return self::$instance->store->put($key, $val);
    }
}