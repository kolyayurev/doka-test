<?php
namespace Core;

ini_set('display_errors', 'On');

use Core\Traits\Singleton;

class Application
{
    use Singleton;

    protected Router $router;
    protected array $config;

    public function __construct()
    {
        $this->router = Router::getInstance();
        $this->loadConfig();
        $this->loadRoutes();
    }

    protected function loadConfig(): void
    {
        $this->config = include(APP_ROOT.'/config/config.php');
    }

    protected function loadRoutes(): void
    {
        require_once APP_ROOT.'/routes/web.php';
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getConfig(string $key,$default = null)
    {
        return $this->config[$key] ?? $default;
    }
}