<?php
/* Smarty version 3.1.36, created on 2020-05-24 10:02:50
  from 'D:\php\Lessons\OpenServer\domains\todo.list\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eca1c1ac49976_50285984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba057a019dbfd6264f33254d9baf410f4c22ce0e' => 
    array (
      0 => 'D:\\php\\Lessons\\OpenServer\\domains\\todo.list\\views\\index.tpl',
      1 => 1590303758,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:todo_list.tpl' => 1,
  ),
),false)) {
function content_5eca1c1ac49976_50285984 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137296055eca1c1ac41c79_62394884', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/app.tpl");
}
/* {block "content"} */
class Block_137296055eca1c1ac41c79_62394884 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_137296055eca1c1ac41c79_62394884',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1 class="mb-3"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
    <div class="card card-body">
        <form class="d-flex flex-row" method="post" action="/todos/store">
            <input class="form-control mr-3" type="text" name="name" placeholder="Новая задача...">
            <div class="custom-control custom-checkbox mt-2 mr-2">
                <input type="checkbox" class="custom-control-input" id="toggle-new" name="done">
                <label class="custom-control-label" for="toggle-new"></label>
            </div>
            <button class="btn btn-success">Создать</button>
        </form>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:todo_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "content"} */
}
