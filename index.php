<?php
include_once 'classes/Tag.php';

$users = ['admin', 'manager', 'student', 'employee'];

$userList = new Tag('ul');

for($i = 0; $i<count($users); $i++){
    $item = new Tag('li');
    $item->appendBody($users[$i]);
    if($i % 2)
        $item->style = 'color:red';

    $userList->appendBody($item);
}

$div = new Tag('div');
$div->class = "class1";
$div->class = "class2";
$div->class = "class1";
$div->appendAttribute("class", "class3");
$div->prependAttribute("class", "class2");
$div->addClass('class4');
$div->removeClass('class2');
$div->removeClass('asd');
$div->style = 'color:red';


echo $div;

?>

<body>
    <h1>Users</h1>
    <?= $userList ?>
</body>
