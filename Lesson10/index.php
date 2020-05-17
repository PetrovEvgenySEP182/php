<?php

use HTML\Doctype;
use HTML\Doctype\DocumentTypeDefinition;

include_once 'autoload.php';

$doctype[] = Doctype::html4s();
$doctype[] = Doctype::html4t();
$doctype[] = Doctype::html4f();
$doctype[] = new Doctype('html5');
$doctype[] = Doctype::html10s();
$doctype[] = Doctype::html10d();
$doctype[] = Doctype::html10f();
$doctype[] = Doctype::html11s();
$doctype[] = Doctype::html11t()->get('html4s');
$doctype[] = Doctype::html11f();

$doctype[1]->getDtd()->setRegistered(true);
$doctype[1]->getDtd()->setOrganization('newOrganization');
$doctype[1]->getDtd()->setLanguage('RU');
$doctype[1]->getDtd()->setUrl('http://www.test.ru/file.dtd');

foreach ($doctype as $value)
    echo $value . "\r\n";

?>

