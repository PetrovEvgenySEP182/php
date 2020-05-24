<?php

namespace App\Core\HTML\Tag;

class TagBody
{
    protected $body;

    public function __construct()
    {
        $this->clear();
    }

    function clear(){
        $this->body = [];
    }

    function append($value){
        $this->body[] = $value;
    }

    function prepend($value){
        array_unshift($this->body, $value);
    }

    function __toString()
    {
        return implode($this->body);
    }
}