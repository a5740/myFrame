<?php
/* Smarty version 3.1.29, created on 2016-03-26 03:15:48
  from "D:\fpt_work\wamp\APMServ5.2.6\www\test\my\View\Index\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f5fee40ebe58_30935719',
  'file_dependency' => 
  array (
    '200a68de4cc0a9f3e71b13a2ec83842214c6b1b1' => 
    array (
      0 => 'D:\\fpt_work\\wamp\\APMServ5.2.6\\www\\test\\my\\View\\Index\\index.html',
      1 => 1458962147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f5fee40ebe58_30935719 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试</title>
</head>
<body>

---------------
{$a}
<?php
$_from = $_smarty_tpl->tpl_vars['b']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['v']->key;?>
">
<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>
--------------
</body>
</html><?php }
}
