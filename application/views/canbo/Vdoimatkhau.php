<script type="text/javascript" src="{$url}assets/js/doimatkhau.js"></script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Đổi mật khẩu
    </h1>
    <ol class="breadcrumb">
      <li><a href="welcome.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Đổi mật khẩu</li>
    </ol>
  </section>
  <section class="content">
      <div class="box">
        <div class="box-body">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <form method="post" action="" id="doimatkhau">
                    <div class="form-group" id="old">
                        <label class="control-label">Mật khẩu cũ</label>
                        <input type="password" id="matkhaucu" value="" class="form-control" name="matkhaucu" placeholder="Mật khẩu cũ" required>
                        <span id="sp"></span>
                    </div>
                    <div class="form-group">
                        <label >Mật khẩu mới</label>
                        <input type="password" id="matkhaumoi" value="" class="form-control" name="matkhaumoi" placeholder="Mật khẩu mới" required>
                    </div>
                    <div class="form-group">
                        <label >Nhập lại mật khẩu</label>
                        <input type="password" id="nhaplaimk" value="" class="form-control" name="nhaplaimk" placeholder="Nhập lại mật khẩu" required>
                        <span id="error_mk" style="color: red; font-weight: bold;"></span>
                    </div>
                   <button type="submit" id="submit" name="ok" value="ok" class="btn btn-primary btn-flat">Xác nhận</button>
                </form>
            </div>
          </div>
        </div>
      </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

