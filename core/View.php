<?php

namespace Core;

class View
{
    public function __construct(
        private string $name,
        private array $data = []
    ) {}

    final function render() {
        extract($this->data);
        header("Content-Type: text/html; charset=UTF-8");
        require_once APP_ROOT. "/resources/views/layouts/app.php";

    }
    final function content() {
        extract($this->data);
        ob_start();
        require_once APP_ROOT. "/resources/views/{$this->name}.php";
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

}