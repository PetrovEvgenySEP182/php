<?php
/* Smarty version 3.1.36, created on 2020-05-20 18:28:00
  from 'D:\php\Lessons\OpenServer\domains\mvc.loc\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ec54c80e762d5_04004675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814cb7951cdeb8da9e5b5b781da1d7ad19c5d107' => 
    array (
      0 => 'D:\\php\\Lessons\\OpenServer\\domains\\mvc.loc\\views\\index.tpl',
      1 => 1589988476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec54c80e762d5_04004675 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="/books" method="POST">
    <input type="text" name="name" placeholder="Название...">
    <input type="text" name="author" placeholder="Автор...">
    <button>Создать</button>
</form>

<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
        <li>
            <?php echo $_smarty_tpl->tpl_vars['book']->value->author;?>
, "<?php echo $_smarty_tpl->tpl_vars['book']->value->name;?>
"
            <form action="/books/delete/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" method="post">
                <button>Удалить</button>
            </form>
        </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<?php }
}
