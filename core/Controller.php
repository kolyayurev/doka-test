<?php

namespace Core;

class Controller
{

    public function view($name, array $data = []){
        (new View($name, $data))->render();
    }
}