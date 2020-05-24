<?php
/* Smarty version 3.1.36, created on 2020-05-21 17:13:17
  from 'D:\php\Lessons\OpenServer\domains\todo.list\views\layouts\app.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec68c7d683c55_78315870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '923547cf2771e3c6b6c5e0d92557b212c4c6049e' => 
    array (
      0 => 'D:\\php\\Lessons\\OpenServer\\domains\\todo.list\\views\\layouts\\app.tpl',
      1 => 1590070249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec68c7d683c55_78315870 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</head>
<body>

    <div class="container py-3">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13844418605ec68c7d67fdd9_01958428', "content");
?>

    </div>

</body>
</html><?php }
/* {block "content"} */
class Block_13844418605ec68c7d67fdd9_01958428 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13844418605ec68c7d67fdd9_01958428',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
