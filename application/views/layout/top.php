<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="30"> 30 giây refesh trang 1 lần-->
  <link href="{$url}assets/img/icondethi.png" rel="shortcut icon" type="image/x-icon" />
  <title>{$title}</title>
  <base href="{$url}">
  <meta name="author" content="Tổ phát triển - Khoa công nghệ thông tin">
  <meta name="copyright" content="Tổ phát triển - Khoa công nghệ thông tin">
  <meta name="description" content="HỆ THỐNG QUẢN LÝ ĐỀ THI - VIỆN ĐẠI HỌC MỞ HÀ NỘI">
  <meta name="robots" content="noindex,nofollow">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$url}assets/css/AdminLTE.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/iCheck/all.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/datatables/dataTables.bootstrap.css">
  <!-- notify-->
  <link rel="stylesheet" href="{$url}assets/js/plugins/notify/jquery.pnotify.default.css">
  <!--radio-->
  <link rel="stylesheet" type="text/css" href="{$url}assets/css/build.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{$url}assets/css/skins/_all-skins.min.css">
  <!-- Bootstrap WYSIHTML5 -->
   <link rel="stylesheet" href="{$url}assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- jQuery 2.2.0 -->
  <script src="{$url}assets/js/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{$url}assets/js/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="{$url}assets/js/plugins/select2/select2.full.min.js"></script>
  <script src="{$url}assets/js/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="{$url}assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="{$url}assets/js/plugins/jquery-validation/additional-methods.min.js"></script>
  <!--jquery-validation-->
  <!-- AdminLTE App -->
  <script src="{$url}assets/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{$url}assets/js/demo.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{$url}assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{$url}assets/js/plugins/iCheck/icheck.min.js"></script>
  <!-- InputMask -->
  <script src="{$url}assets/js/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="{$url}assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="{$url}assets/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- Select2 -->
  <!-- Footable -->
  <script type="text/javascript" src="{$url}assets/js/plugins/footable/footable.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{$url}assets/css/footable/footable.core.css">
  <!-- DataTables -->
  <script src="{$url}assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{$url}assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- Notify -->
  <script type="text/javascript" src="{$url}assets/js/plugins/notify/jquery.pnotify.min.js"></script>
  <script type="text/javascript" src="{$url}assets/js/plugins/notify/pnotify.custom.min.js"></script>
  <script src="{$url}assets/js/extension.js?v={$smarty.now}"></script>
  <script type="text/javascript">
    var url = $('base').attr('href');
  </script>
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
    <a href="{$url}welcome.html" class="logo">
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
              <img src="{$url}assets/img/{if !empty($duongdananh)}{$dethi['PK_sMaCB']}.jpg?v={$smarty.now}{else}avatar04.png?v={$smarty.now}{/if}" class="user-image" alt="{$dethi['sTenCB']}">
              <span class="hidden-xs">{$dethi['sTenCB']}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{$url}assets/img/{if !empty($duongdananh)}{$dethi['PK_sMaCB']}.jpg?v=time{$smarty.now}{else}avatar04.png?v={$smarty.now}{/if}" class="img-circle" alt="{$dethi['sTenCB']}">

                <p>
                  {$dethi['sTenQuyen']}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{$url}doimatkhau" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                </div>
                <div class="pull-right">
                  <a href="{$url}dangxuat" class="btn btn-default btn-flat">Đăng xuất</a>
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
          <img src="{$url}assets/img/{if !empty($duongdananh)}{$dethi['PK_sMaCB']}.jpg?v={$smarty.now}{else}avatar04.png?v={$smarty.now}{/if}" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p>{$dethi['sTenCB']}</p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Bảng điều khiển</li>
            {if $dethi['FK_iMaQuyen'] == 1}
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Quản lý hệ thống</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right" style="margin-right: 10px"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{$url}khoa"><i class="fa fa-circle-o"></i> Danh mục Đơn vị</a></li>
                <li><a href="{$url}nganh"><i class="fa fa-circle-o"></i> Danh mục Ngành</a></li>
                <li><a href="{$url}trinhdo"><i class="fa fa-circle-o"></i> Danh mục Trình độ đào tạo</a></li>
                <li><a href="{$url}monhoc"><i class="fa fa-circle-o"></i> Danh mục Môn học</a></li>
                <li><a href="{$url}diadiem"><i class="fa fa-circle-o"></i> Danh mục Địa điểm thi</a></li>
                <li><a href="{$url}canbo"><i class="fa fa-circle-o"></i> Quản lý Cán bộ</a></li>
              </ul>
            </li>
            {/if}
            <!-- {(current_url()==base_url('Test')) ? 'active':''} -->
            <li class="treeview">
                <a href="{$url}chuongtrinhdaotao">
                    <i class="fa fa-line-chart"></i> <span>Chương trình đào tạo</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{$url}dsdethi">
                    <i class="fa  fa-file-text-o"></i> <span>Quản lý đề thi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{$url}tochucthi">
                    <i class="fa  fa-sitemap"></i> <span>Tổ chức thi</span>
                </a>
            </li>
<!--             <li class="treeview">
                <a href="{$url}baocaothongke">
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
                <li><a href="{$url}soluongdedonvi"><i class="fa fa-circle-o"></i>Số lượng đề đơn vị</a></li>
                <li><a href="{$url}baocaotonghop"><i class="fa fa-circle-o"></i>Báo cáo tổng hợp</a></li>
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
                <li><a href="{$url}bienbangiaodethi"><i class="fa fa-circle-o"></i> Biên bản giao đề thi</a></li>
              </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>