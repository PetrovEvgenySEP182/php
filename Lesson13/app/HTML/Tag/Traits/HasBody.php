<?php

namespace HTML\Tag\Traits;

use HTML\Tag\TagBody;

trait HasBody
{
    protected $body;

    protected function bodyInit(){
        $this->body = new TagBody();
    }

    function getBody() : TagBody{
        return $this->body;
    }

    function appendBody($value){
        $this->getBody()->append($value);
        return $this;
    }

    function prependBody($value){
        $this->getBody()->prepend($value);
        return $this;
    }

    function appendTo(BaseTag $tag){
        $tag->appendBody($this);
        return this;
    }

    function prependTo(BaseTag $tag){
        $tag->prependBody($tag);
        return $this;
    }
}