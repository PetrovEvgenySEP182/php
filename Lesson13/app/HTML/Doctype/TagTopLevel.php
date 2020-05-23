<?php


namespace HTML\Doctype;


class TagTopLevel
{
    protected $name;

    private const TOP_LEVEL_TAGS = [
        'html', 'head', 'body'
    ];

    public function __construct($name){
        $this->set($name);
        return $this;
    }

    private  function set(string $name) : self{
        $this->name = (in_array($name, self::TOP_LEVEL_TAGS)) ? $name : self::TOP_LEVEL_TAGS[0];
        return $this;
    }

    public function get() : string{
        return $this->name;
    }

    public function __toString() : string{
        return $this->get();
    }
}