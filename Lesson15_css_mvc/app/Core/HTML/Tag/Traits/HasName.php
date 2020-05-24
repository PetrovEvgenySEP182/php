<?php

namespace App\Core\HTML\Tag\Traits;

use App\Core\HTML\Tag\TagName;

trait HasName
{
    protected $name;

    protected function nameInit($name) {
        $this->name = new TagName($name);
    }

    public function name(){
        return $this->name;
    }

    function isSelfClosing(): bool {
        return $this->name()->isSelfClosing();
    }
}