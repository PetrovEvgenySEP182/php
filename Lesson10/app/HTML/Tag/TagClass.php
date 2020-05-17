<?php

namespace HTML\Tag;

class TagClass
{
    private $classes = [];

    public function __construct($value)
    {
        if(is_array($value))
            $this->set($value);
        else
            $this->append($value);
    }

    function set(array $value){
        $this->classes = $value;
    }

    function get(){
        return $this->classes;
    }

    function isExists($value) : bool{
        return in_array($value, $this->get());
    }

    function remove($value){
        $key = array_search($value,$this->get());
        if($key)
            unset($this->classes[$key]);
    }

    function append($value){
        if(!$this->isExists($value))
            $this->classes[] = $value;
    }

    public function __toString() : string
    {
        $result = '';
        $values = array_values($this->get());
        $count = count($values);
        for($i = 0; $i < $count; $i++){
            $result .= $values[$i];
            if($count - 1 > $i)
                $result .= ' ';
        }
        return $result;
    }
}