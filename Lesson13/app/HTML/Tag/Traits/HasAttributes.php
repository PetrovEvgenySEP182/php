<?php

namespace HTML\Tag\Traits;

use HTML\Tag\TagAttributes;

trait HasAttributes
{
    protected $attributes;

    protected function attributesInit()
    {
        $this->attributes = new TagAttributes();
    }

    function attributes(){
        return $this->attributes;
    }

    function setAttribute(string $key, $value){
        $this->attributes->$key = $value;
    }

    function getAttribute(string $key){
        return $this->attributes->$key ?? null;
    }

    function appendAttribute(string $key, $value){
        $this->attributes()->append($key, $value);
    }

    function prependAttribute(string $key, $value){
        $this->attributes()->prepend($key, $value);
    }

    function addClass($class){
        $this->attributes()->addClass($class);
    }

    function removeClass($class){
        $this->attributes()->removeClass($class);
    }

    function classExists($class) : bool{
        return $this->attributes()->classExists($class);
    }

    function __get($name)
    {
        return $this->getAttribute($name);
    }

    public function __set($name, $value)
    {
        $this->setAttribute($name, $value);
    }
}