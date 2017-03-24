<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="30"> 30 giây refesh trang 1 lần-->
  <link href="{$url}assets/img/icondethi.png" rel="shortcut icon" type="image/x-icon" />
  <title>HỆ THỐNG QUẢN LÝ ĐỀ THI - VIỆN ĐẠI HỌC MỞ HÀ NỘI</title>
  <base href="">
  <meta name="author" content="Nguyễn Xuân Hải">
  <meta name="copyright" content="QUẢN LÝ ĐẢNG VIÊN">
  <meta name="description" content="Quản lý Đảng viên Viện đại Học Mở Hà Nội">
  <meta name="robots" content="noindex,nofollow">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{$url}assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{$url}assets/js/plugins/iCheck/square/blue.css">

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
          {if $ketqua=='failed'}<p style="color:red">Tài khoản hoặc mật khẩu sai</p>{/if}
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
<script src="{$url}assets/js/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{$url}assets/js/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{$url}assets/js/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
