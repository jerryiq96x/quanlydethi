<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-22 01:43:49
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\errors\Error_403.php" */ ?>
<?php /*%%SmartyHeaderCode:43038272258d1d6d523b620-64869194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99841e0ba98470602fe99c02a094925ce7e55dff' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\errors\\Error_403.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43038272258d1d6d523b620-64869194',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58d1d6d527b213_77764683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d1d6d527b213_77764683')) {function content_58d1d6d527b213_77764683($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <base href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản lý đề thi | 403 Error</title>

    <link href="assets/js/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/js/plugins/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- <link href="assets/plugins/css/animate.css" rel="stylesheet"> -->
    <!-- <link href="assets/js/plugins/css/style.css" rel="stylesheet"> -->

</head>

<body class="gray-bg">


<div class="middle-box text-center animated fadeInDown">
    <h1>403</h1>
    <h3 class="font-bold">Forbidden</h3>

    <div class="error-desc">
        Xin lỗi, bạn không có quyền chuy cập chức năng vừa yêu cầu!<br />
        <!-- <form class="form-inline m-t" role="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tìm trang khác">
            </div>
            <button type="submit" class="btn btn-info btn-flat">Tìm</button>
        </form> -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
welcome.html" class="btn btn-flat btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
    </div>
</div>

<!-- Mainly scripts -->
<?php echo '<script'; ?>
 src="assets/js/plugins/jQuery/jquery-2.2.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>

</html>
<?php }} ?>
