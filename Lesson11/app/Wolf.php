<?php


use Traits\CanHunt;
use Traits\CanSwim;
use Traits\HasWool;
use KindsInterface\IOverlandKind;

class Wolf implements IOverlandKind
{
    use CanSwim, CanHunt, HasWool;

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