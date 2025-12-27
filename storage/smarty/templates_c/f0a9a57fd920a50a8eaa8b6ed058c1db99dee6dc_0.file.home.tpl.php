<?php
/* Smarty version 4.5.6, created on 2025-12-27 06:20:25
  from '/var/www/html/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_694f7aa983b546_95061031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9a57fd920a50a8eaa8b6ed058c1db99dee6dc' => 
    array (
      0 => '/var/www/html/templates/home.tpl',
      1 => 1766782936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_694f7aa983b546_95061031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_447148099694f7aa97e4308_43364082', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'layout.tpl');
}
/* {block 'content'} */
class Block_447148099694f7aa97e4308_43364082 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_447148099694f7aa97e4308_43364082',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

    <section class="latest-posts">
        <h2 class="section-title">Fresh from the Blog</h2>
        <div class="grid">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latestArticles']->value, 'article');
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </section>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['category']->value['latest_posts']) {?>
            <div class="divider"></div>
            
            <section class="category-section">
                <div class="category-header">
                    <div>
                        <h2 class="section-title" style="margin-bottom: 0.5rem;"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</h2>
                        <p class="category-desc" style="color: #666; margin-bottom: 0;"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</p>
                    </div>
                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" class="btn-outline">View All</a>
                </div>
                
                <div class="grid">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['latest_posts'], 'article');
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </section>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
/* {/block 'content'} */
}
