<?php

require_once 'TagName.php';
require_once 'TagAttributes.php';

class Tag
{
    private $name;
    private $attributes;
    private $body;

    public function __construct(string $name)
    {
        $this->name = new TagName($name);
        $this->attributes = new TagAttributes();
    }

    public function name(){
        return $this->name;
    }

    public function getBody(){
        return ($this->isSelfClosing()) ? "" : $this->body;
    }

    private function setBody($body){
        $this->body = $body;
    }

    function appendBody($value){
        $this->setBody($this->getBody() . $value);
    }

    function prependBody($value){
        $this->setBody($value . $this->getBody());
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

    function isSelfClosing(): bool
    {
        return $this->name()->isSelfClosing();
    }

    function start() : string {
        $str = "<{$this->name()}{$this->attributes()}";

        $str .= (!$this->isSelfClosing()) ? ">" : "/>";

        return $str;
    }

    function end() : string  {
        return (!$this->isSelfClosing()) ? "</{$this->name()}>" : "";
    }

    function __toString() : string{
        return $this->start() . $this->getBody() . $this->end();
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


