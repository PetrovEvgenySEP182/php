<?php

namespace HTML;

use HTML\Tag\Traits\HasAttributes;
use HTML\Tag\Traits\HasBody;
use HTML\Tag\Traits\HasName;

abstract class BaseTag
{
    use HasName;
    use HasAttributes;
    use HasBody;

    public function __construct(string $name)
    {
        $this->nameInit($name);
        $this->attributesInit();
        $this->bodyInit();
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
        $body = $this->isSelfClosing() ? '' : $this->getBody();
        return $this->start() . $body . $this->end();
    }
}


