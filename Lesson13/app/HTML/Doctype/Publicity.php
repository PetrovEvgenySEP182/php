<?php


namespace HTML\Doctype;


class Publicity
{
    protected $value;

    private const PUBLICITY_VALUES = [
        'public', 'system'
    ];

    public function __construct($value){
        $this->set($value);
        return $this;
    }

    function set(string $value) : self {
        $this->value = (in_array($value, self::PUBLICITY_VALUES)) ? $value : self::PUBLICITY_VALUES[0];
        $this->value = strtoupper($value);
        return $this;
    }

    public function get() : string{
        return $this->value;
    }

    public function __toString() : string{
        return $this->get();
    }

}