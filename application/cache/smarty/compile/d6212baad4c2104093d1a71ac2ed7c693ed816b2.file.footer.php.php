<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 02:03:16
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\layout\footer.php" */ ?>
<?php /*%%SmartyHeaderCode:603457738586c57e47d0148-80727024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6212baad4c2104093d1a71ac2ed7c693ed816b2' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\layout\\footer.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '603457738586c57e47d0148-80727024',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c57e47e2717_99880340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c57e47e2717_99880340')) {function content_586c57e47e2717_99880340($_smarty_tpl) {?> <footer class="main-footer">
    <strong>Phát triển bởi:<a href="https://www.facebook.com/tophatrienvachuyengiaocongnghe"><i class="fa fa-heartbeat"></i> Tổ phát triển - Khoa công nghệ thông tin</a></strong>
  </footer>

 
</div>
<!-- ./wrapper -->
<!-- SlimScroll -->
<?php echo '<script'; ?>
>
	$('a').tooltip();
	$('button').tooltip();	
<?php echo '</script'; ?>
>
<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
    <?php echo '<script'; ?>
 type='text/javascript'>
	    $(document).ready(function() {
	        showMessage( "<?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
","<?php echo $_smarty_tpl->tpl_vars['message']->value['type'];?>
");
	    });
	<?php echo '</script'; ?>
>
<?php }?>
</body>
</html><?php }} ?>
