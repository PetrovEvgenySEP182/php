<?php

require_once "autoload.php";

//$people = new Collection();
//$people->John = "Wick";
//$people->Sarah = "Conor";
//
//unset($people['John']);
//var_dump($people->toArray());


$queue = new Queue();
$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->push(4);
$queue->push(5);

foreach ($queue as $value){
    echo $value . "\r\n";
}
