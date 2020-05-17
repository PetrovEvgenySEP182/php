<?php

namespace HTML;

use HTML\Doctype\DocumentTypeDefinition;
use HTML\Doctype\Publicity;

/**
 * Class Doctype
 * @package HTML
 * @method static Doctype html4s()
 * @method static Doctype html4t()
 * @method static Doctype html4f()
 * @method static Doctype html5()
 * @method static Doctype html10s()
 * @method static Doctype html10t()
 * @method static Doctype html10f()
 * @method static Doctype html11s()
 */
class Doctype
{
    protected $publicity;
    protected $dtd;

    protected $TYPE_VALUES;

    public function __construct(string $type){

        $this->TYPE_VALUES = $this->getTypeValues();
        $this->setDtd($type);
        $this->publicity = ($this->getDtd() != null) ? new Publicity('public') : null;

        return $this;
    }

    //<editor-fold desc="PublicityRegion">
    function setPublicity(string $publicity){
        if($this->getPublicity() == null)
            $this->publicity = new Publicity($publicity);
        else
            $this->publicity->set($this->publicity);
    }

    function getPublicity(){
        return  $this->publicity;
    }
    //</editor-fold>


    private function setDtd(string $type) : self {
        $pattern = "/(?<version>html[\d]{1,2})(?<syntax>[A-Za-z])/";
        preg_match($pattern, $type, $matches);

        if(!$matches || !array_key_exists($matches['version'], $this->TYPE_VALUES)
            || !array_key_exists($matches['syntax'], $this->TYPE_VALUES[$matches['version']]))
            $this->dtd = null;
        else
            $this->dtd = clone $this->TYPE_VALUES[$matches['version']][$matches['syntax']] ?? null;
        if($this->dtd != null)
            $this->setPublicity('public');

        return $this;
    }

    /**
     * @return DocumentTypeDefinition
     */
    function getDtd() {
        return $this->dtd;
    }

    function get(string $type){
        $this->setDtd($type);
        $this->publicity = ($this->getDtd() != null) ? new Publicity('public') : null;

        $str = '<!DOCTYPE html';
        $str .= " {$this->getPublicity()}";
        $str .= " {$this->getDtd()}";
        return $str . '>';
    }

    private function getTypeValues() : array {
        $res = [];

        $res['html4']['s'] = new DocumentTypeDefinition("\"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\"");
        $res['html4']['t'] = new DocumentTypeDefinition("\"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\"");
        $res['html4']['f'] = new DocumentTypeDefinition("\"-//W3C//DTD HTML 4.01 Frameset//EN\" \"http://www.w3.org/TR/html4/frameset.dtd\"");
        $res['html10']['s'] = new DocumentTypeDefinition("\"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"");
        $res['html10']['t'] = new DocumentTypeDefinition("\"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"");
        $res['html10']['f'] = new DocumentTypeDefinition("\"-//W3C//DTD XHTML 1.0 Frameset//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd\"");
        $res['html11']['s'] = new DocumentTypeDefinition("\"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\"");

        return $res;
    }

    public function __toString(){
        $str = '<!DOCTYPE html';
        if($this->getPublicity() != null && $this->getDtd() != null)
            $str .= " {$this->publicity}";
        if($this->getDtd() != null)
            $str .= " {$this->dtd}";
        return $str . '>';
    }

    static function __callStatic($name, $arguments)
    {
        return new self($name);
    }
}