<?php

namespace App\Core\HTML;

use App\Core\HTML\Tag\Traits\HasAttributes;
use App\Core\HTML\Tag\Traits\HasBody;
use App\Core\HTML\Tag\Traits\HasName;

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


