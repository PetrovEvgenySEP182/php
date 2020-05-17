<?php


use \Traits\CanSwim;
use KindsInterface\IFishKind;
use Traits\HasFeathers;
use Traits\HasFin;

class Shark implements IFishKind
{
    use CanSwim, HasFin;


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