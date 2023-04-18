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
        $url_components = parse_url($this->getUri());

        parse_str($url_components['query'], $params);

        return $params[$name] ?? $default;
    }
}