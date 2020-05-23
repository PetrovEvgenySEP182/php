<?php

error_reporting(E_ALL ^ E_NOTICE);

spl_autoload_register(function ($name){

    $name = str_replace('\\', DIRECTORY_SEPARATOR, $name);
    $path = __DIR__
        . DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . $name
        . '.php';

    if(!is_file($path))
    {
        $items = explode('\\', $name);
        $className = array_pop($items);
        die ($className);
    }

    require_once $path;

});