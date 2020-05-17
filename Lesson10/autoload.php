<?php

spl_autoload_register(function ($name){
    require_once "./app/{$name}.php";
});