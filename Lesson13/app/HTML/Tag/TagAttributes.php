<?php

namespace HTML\Tag;

class TagAttributes
{
    private $attributes = [];

    function set(string $key, $value){
        $this->attributes[$key] = (!$this->isClass($key)) ? new TagClass($value) : $value;
    }

    function get(string $key){
        return $this->attributes[$key] ?? null;
    }

    function prepend(string $key, $value){
        if(!$this->isClass($key))
            $this->addClass($value);
        else
            $this->$key .= $value;
    }

    function append(string $key, $value){
        if(!$this->isClass($key))
            $this->addClass($value);
        else
            $this->$key = $value . $this->$key;
    }

    function addClass($class){
        $classAttr = $this->class;
        if($classAttr)
            $classAttr->append($class);
        else
            $this->set('class', $class);
    }

    function classExists($class): bool {
        return $this->class->isExists($class) ?? false;
    }

    function removeClass($class){
        $classAttr = $this->class;
        if($classAttr)
            $classAttr->remove($class);
    }

    function isClass($key){
        return strcasecmp($key, "class");
    }

    public function __get($name){
        return $this->get($name);
    }

    public function __set($name, $value){
        $this->set($name, $value);
    }

    function keys(){
        return array_keys($this->attributes);
    }

    public function __toString() : string
    {
        $result = '';
        foreach ($this->keys() as $key)
            $result .= " $key=\"{$this->$key}\"";

        return $result;
    }



}