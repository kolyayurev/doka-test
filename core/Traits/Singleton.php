<?php 
namespace Core\Traits;


trait Singleton
{
    protected static self|null $instance = null;

    private function __construct(){}
    final public function __clone(){}
    final public function __wakeup(){}

    public static function getInstance(): static
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}