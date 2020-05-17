<?php


namespace KindsInterface;


use IKind;

interface IBirdKind extends IKind
{
    function hasFeathers(); //Перья
    function hasBeak(); //Клюв
    function hasWings(); //Крылья
}
