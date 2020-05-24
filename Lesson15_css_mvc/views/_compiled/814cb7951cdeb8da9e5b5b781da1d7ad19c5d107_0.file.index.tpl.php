<?php
/* Smarty version 3.1.36, created on 2020-05-24 09:37:27
  from 'D:\php\Lessons\OpenServer\domains\mvc.loc\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5eca1627d144b1_47945461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '814cb7951cdeb8da9e5b5b781da1d7ad19c5d107' => 
    array (
      0 => 'D:\\php\\Lessons\\OpenServer\\domains\\mvc.loc\\views\\index.tpl',
      1 => 1590302199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eca1627d144b1_47945461 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="style/main.css"/>


<div class="container">

    <form class="new-book-container" action="/books" method="POST">
        <div>
            <input type="text" name="name" placeholder="Название...">
            <input type="text" name="author" placeholder="Автор...">
        </div>
        <button>Добавить</button>
    </form>

    <ul class="books-container">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
            <li>
                <div>
                    <?php echo $_smarty_tpl->tpl_vars['book']->value->author;?>
, "<?php echo $_smarty_tpl->tpl_vars['book']->value->name;?>
"
                </div>
                <form action="/books/delete/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" method="post">
                    <button>Удалить</button>
                </form>
            </li>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>

</div>



<?php }
}
