<?php


namespace KindsInterface;


use IKind;

interface IFishKind extends IKind
{
    function swim();
    function hasFin(); // Плавники
}