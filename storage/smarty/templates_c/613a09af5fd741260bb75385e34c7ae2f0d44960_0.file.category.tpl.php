<?php
/* Smarty version 4.5.6, created on 2025-12-27 06:44:07
  from '/var/www/html/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_694f8037a31d58_20989745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '613a09af5fd741260bb75385e34c7ae2f0d44960' => 
    array (
      0 => '/var/www/html/templates/category.tpl',
      1 => 1766817639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_694f8037a31d58_20989745 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_597835813694f8037a19d42_33351375', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'content'} */
class Block_597835813694f8037a19d42_33351375 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_597835813694f8037a19d42_33351375',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

    <div class="page-header">
        <h1><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h1>
        <p><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</p>
    </div>

    <div class="controls">
        <span class="sort-label">Sort by:</span>
        <div class="sort-options">
            <a href="?sort=date_desc" class="<?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'date_desc') {?>active<?php }?>">Newest</a>
            <a href="?sort=date_asc" class="<?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'date_asc') {?>active<?php }?>">Oldest</a>
            <a href="?sort=views_desc" class="<?php if ($_smarty_tpl->tpl_vars['currentSort']->value == 'views_desc') {?>active<?php }?>">Popular</a>
        </div>
    </div>

    <div class="grid">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
            <article class="card">
                <a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="card-image">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">
                </a>
                <div class="card-content">
                    <div class="card-meta">
                        <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%B %e, %Y");?>
</span>
                        <span>&bull;</span>
                        <span><?php echo $_smarty_tpl->tpl_vars['article']->value['views'];?>
 views</span>
                    </div>
                    <h3><a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
                    <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['article']->value['description'],100);?>
</p>
                    <a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="read-more">Read More</a>
                </div>
            </article>
        <?php
}
if ($_smarty_tpl->tpl_vars['article']->do_else) {
?>
            <p>No articles found in this category.</p>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
        <div class="pagination">
            <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['currentSort']->value;?>
">&laquo;</a>
            <?php }?>
            
            <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['totalPages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['totalPages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration === 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['currentSort']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['currentPage']->value) {?>active<?php }?>"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
            <?php }
}
?>

            <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;?>
&sort=<?php echo $_smarty_tpl->tpl_vars['currentSort']->value;?>
">&raquo;</a>
            <?php }?>
        </div>
    <?php }
}
}
/* {/block 'content'} */
}
