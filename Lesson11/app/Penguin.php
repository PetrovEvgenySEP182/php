<?php

use KindsInterface\IBirdKind;
use Traits\CanSwim;
use Traits\HasBeak;
use Traits\HasFeathers;
use Traits\HasWings;

class Penguin implements IBirdKind
{
    use CanSwim, HasWings, HasBeak, HasFeathers;

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