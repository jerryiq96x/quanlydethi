<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 03:47:33
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\Vdangnhap.php" */ ?>
<?php /*%%SmartyHeaderCode:1876805470586c7055986559-81141749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9841d827571d4eefa6f9927115454c836860a63a' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\Vdangnhap.php',
      1 => 1483003842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1876805470586c7055986559-81141749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'ketqua' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c7055c320b8_80243368',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c7055c320b8_80243368')) {function content_586c7055c320b8_80243368($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="30"> 30 giây refesh trang 1 lần-->
  <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/icondethi.png" rel="shortcut icon" type="image/x-icon" />
  <title>HỆ THỐNG QUẢN LÝ ĐỀ THI - VIỆN ĐẠI HỌC MỞ HÀ NỘI</title>
  <base href="">
  <meta name="author" content="Nguyễn Xuân Hải">
  <meta name="copyright" content="QUẢN LÝ ĐẢNG VIÊN">
  <meta name="description" content="Quản lý Đảng viên Viện đại Học Mở Hà Nội">
  <meta name="robots" content="noindex,nofollow">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Quản lý đề thi</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để bắt đầu làm việc</p>

    <form action="" method="post" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" name="taikhoan" class="form-control" placeholder="Tài khoản" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="matkhau" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-8">
          <?php if ($_smarty_tpl->tpl_vars['ketqua']->value=='failed') {?><p style="color:red">Tài khoản hoặc mật khẩu sai</p><?php }?>
        </div>
        <div class="col-xs-4">
          <button type="submit" name="dangnhap" value="dangnhap" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div><br/>
    </form>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/jQuery/jQuery-2.2.0.min.js"><?php echo '</script'; ?>
>
<!-- Bootstrap 3.3.6 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- iCheck -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
