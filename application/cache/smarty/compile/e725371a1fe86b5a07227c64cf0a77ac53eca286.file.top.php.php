<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-22 01:43:03
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\layout\top.php" */ ?>
<?php /*%%SmartyHeaderCode:1073281142586c57e44b0928-61356733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e725371a1fe86b5a07227c64cf0a77ac53eca286' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\layout\\top.php',
      1 => 1490146976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1073281142586c57e44b0928-61356733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c57e467d501_06680386',
  'variables' => 
  array (
    'url' => 0,
    'title' => 0,
    'duongdananh' => 0,
    'dethi' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c57e467d501_06680386')) {function content_586c57e467d501_06680386($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="30"> 30 giây refesh trang 1 lần-->
  <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/icondethi.png" rel="shortcut icon" type="image/x-icon" />
  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  <base href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
  <meta name="author" content="Tổ phát triển - Khoa công nghệ thông tin">
  <meta name="copyright" content="Tổ phát triển - Khoa công nghệ thông tin">
  <meta name="description" content="HỆ THỐNG QUẢN LÝ ĐỀ THI - VIỆN ĐẠI HỌC MỞ HÀ NỘI">
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
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/iCheck/all.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/datatables/dataTables.bootstrap.css">
  <!-- notify-->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/notify/jquery.pnotify.default.css">
  <!--radio-->
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/css/build.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/css/skins/_all-skins.min.css">
  <!-- Bootstrap WYSIHTML5 -->
   <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/select2/select2.full.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/slimScroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/jquery-validation/jquery.validate.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/jquery-validation/additional-methods.min.js"><?php echo '</script'; ?>
>
  <!--jquery-validation-->
  <!-- AdminLTE App -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/app.min.js"><?php echo '</script'; ?>
>
  <!-- AdminLTE for demo purposes -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/demo.js"><?php echo '</script'; ?>
>
  <!-- Bootstrap WYSIHTML5 -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"><?php echo '</script'; ?>
>
  <!-- iCheck 1.0.1 -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
  <!-- InputMask -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/input-mask/jquery.inputmask.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/input-mask/jquery.inputmask.extensions.js"><?php echo '</script'; ?>
>
  <!-- Select2 -->
  <!-- Footable -->
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/footable/footable.all.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/css/footable/footable.core.css">
  <!-- DataTables -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/datatables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
  <!-- Notify -->
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/notify/jquery.pnotify.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/plugins/notify/pnotify.custom.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/extension.js?v=<?php echo time();?>
"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript">
    var url = $('base').attr('href');
  <?php echo '</script'; ?>
>
  <style>
  .error{
    color: red;
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
welcome.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Đ</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quản lý đề thi</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Quản lý đề thi</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/<?php if (!empty($_smarty_tpl->tpl_vars['duongdananh']->value)) {
echo $_smarty_tpl->tpl_vars['dethi']->value['PK_sMaCB'];?>
.jpg?v=<?php echo time();
} else { ?>avatar04.png?v=<?php echo time();
}?>" class="user-image" alt="<?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenCB'];?>
">
              <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenCB'];?>
</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/<?php if (!empty($_smarty_tpl->tpl_vars['duongdananh']->value)) {
echo $_smarty_tpl->tpl_vars['dethi']->value['PK_sMaCB'];?>
.jpg?v=time<?php echo time();
} else { ?>avatar04.png?v=<?php echo time();
}?>" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenCB'];?>
">

                <p>
                  <?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenQuyen'];?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
doimatkhau" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dangxuat" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/<?php if (!empty($_smarty_tpl->tpl_vars['duongdananh']->value)) {
echo $_smarty_tpl->tpl_vars['dethi']->value['PK_sMaCB'];?>
.jpg?v=<?php echo time();
} else { ?>avatar04.png?v=<?php echo time();
}?>" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p><?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenCB'];?>
</p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Bảng điều khiển</li>
            <?php if ($_smarty_tpl->tpl_vars['dethi']->value['FK_iMaQuyen']==1) {?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Quản lý hệ thống</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right" style="margin-right: 10px"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
khoa"><i class="fa fa-circle-o"></i> Danh mục Đơn vị</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
nganh"><i class="fa fa-circle-o"></i> Danh mục Ngành</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
trinhdo"><i class="fa fa-circle-o"></i> Danh mục Trình độ đào tạo</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
monhoc"><i class="fa fa-circle-o"></i> Danh mục Môn học</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
diadiem"><i class="fa fa-circle-o"></i> Danh mục Địa điểm thi</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
canbo"><i class="fa fa-circle-o"></i> Quản lý Cán bộ</a></li>
              </ul>
            </li>
            <?php }?>
            <!-- <?php echo current_url()==base_url('Test') ? 'active' : '';?>
 -->
            <li class="treeview">
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
chuongtrinhdaotao">
                    <i class="fa fa-line-chart"></i> <span>Chương trình đào tạo</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dsdethi">
                    <i class="fa  fa-file-text-o"></i> <span>Quản lý đề thi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
tochucthi">
                    <i class="fa  fa-sitemap"></i> <span>Tổ chức thi</span>
                </a>
            </li>
<!--             <li class="treeview">
                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
baocaothongke">
                    <i class="fa fa-bar-chart"></i> <span>Báo cáo thống kê</span>
                </a>
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Báo cáo thống kê</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right" style="margin-right: 10px"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
soluongdedonvi"><i class="fa fa-circle-o"></i>Số lượng đề đơn vị</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
baocaotonghop"><i class="fa fa-circle-o"></i>Báo cáo tổng hợp</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text"></i>
                <span>Lập biên bản</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right" style="margin-right: 10px"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
bienbangiaodethi"><i class="fa fa-circle-o"></i> Biên bản giao đề thi</a></li>
              </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside><?php }} ?>
