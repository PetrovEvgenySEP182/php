<?php

namespace App\Core\HTML\Tag;

use App\Core\HTML\BaseTag;

class Link extends BaseTag
{
    public function __construct()
    {
        parent::__construct('a');
    }
}