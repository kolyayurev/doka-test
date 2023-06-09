<?php



if (! function_exists('app')) {
    function app()
    {
        return Core\Application::getInstance();
    }
}

if (! function_exists('config')) {
    function config(string $key,$default = null)
    {
        return app()->getConfig($key,$default);
    }
}

if (! function_exists('view')) {
    function view(string $name,array $data = [])
    {
        extract($data);
        require APP_ROOT. "/resources/views/{$name}.php";
    }
}

if (! function_exists('dump')) {
    function dump(){
        echo '<pre>';
        var_dump(func_get_args());
        echo '</pre>';
    }
}

if (! function_exists('dd')) {
    function dd(){
        echo '<pre>';
        var_dump(func_get_args());
        echo '</pre>';
        die();
    }
}

