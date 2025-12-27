<?php
/* Smarty version 4.5.6, created on 2025-12-27 06:23:41
  from '/var/www/html/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_694f7b6d8cd1f6_76686084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7ce982e87a0751ddfd330495858f5b00ae2a65a' => 
    array (
      0 => '/var/www/html/templates/article.tpl',
      1 => 1766782890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_694f7b6d8cd1f6_76686084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1425901355694f7b6d88e228_38720689', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'content'} */
class Block_1425901355694f7b6d88e228_38720689 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1425901355694f7b6d88e228_38720689',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <article class="full-article">
        <header class="article-header">
            <div class="article-meta">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" class="badge"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['created_at'],"%B %e, %Y");?>
</span>
                <span><?php echo $_smarty_tpl->tpl_vars['article']->value['views'];?>
 views</span>
            </div>
            <h1><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</h1>
        </header>

        <div class="article-image">
            <img src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">
        </div>

        <div class="article-content">
            <?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

        </div>
    </article>

    <div class="divider"></div>

    <?php if ($_smarty_tpl->tpl_vars['relatedArticles']->value) {?>
        <section class="related-articles">
            <h2 class="section-title">You might also like</h2>
            <div class="grid">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['relatedArticles']->value, 'article');
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
                             <h3><a href="/article/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
                        </div>
                    </article>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </section>
    <?php }
}
}
/* {/block 'content'} */
}
