<?php
namespace Core;

class Request
{
    public function getUri() : string
    {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }

	public function getPath()
    {
        $path = $this->getUri();

        $position = strpos($path, '?');

        if ($position === false) return $path;
        
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getParam(string $name, $default = null)
    {
        $params = [];

        $url_components = parse_url($this->getUri());

        if(array_key_exists('query',$url_components))
            parse_str($url_components['query'], $params);

        return $params[$name] ?? $default;
    }
}