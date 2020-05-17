<?php


use KindsInterface\ISpiderKind;
use Traits\CanHunt;
use Traits\CanMakeWeb;
use Traits\HasWool;

class BlackWidow implements ISpiderKind
{
    use CanMakeWeb, CanHunt, HasWool;

    function move()
    {
        // TODO: Implement move() method.
    }

    function eat()
    {
        // TODO: Implement eat() method.
    }

    function sleep()
    {
        // TODO: Implement sleep() method.
    }

    function hear()
    {
        // TODO: Implement hear() method.
    }

    function breathe()
    {
        // TODO: Implement breathe() method.
    }
}
