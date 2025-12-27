<?php
/* Smarty version 4.5.6, created on 2025-12-27 06:20:25
  from '/var/www/html/templates/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_694f7aa987de86_59073115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a0c729172fafa92df9cfe9fa397716257ca8ee3' => 
    array (
      0 => '/var/www/html/templates/layout.tpl',
      1 => 1766782880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_694f7aa987de86_59073115 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? 'Blog' ?? null : $tmp);?>
 - Blogy.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="/" class="logo">Blogy.</a>
            <nav>
                <a href="/">Home</a>
                <a href="#footer">Contact</a>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="container">
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1177454523694f7aa9877547_72895361', 'content');
?>

        </div>
    </main>

    <footer id="footer" class="site-footer">
        <div class="container">
            <p>&copy; <?php echo smarty_modifier_date_format(time(),'%Y');?>
 Blogy. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php }
/* {block 'content'} */
class Block_1177454523694f7aa9877547_72895361 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1177454523694f7aa9877547_72895361',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'content'} */
}
