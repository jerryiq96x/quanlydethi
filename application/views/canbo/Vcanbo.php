<div class="content-wrapper">

  <section class="content-header">
    <h1>
        Cán bộ
    </h1>
    <ol class="breadcrumb">
      <li><a href="welcome.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh sách cán bộ</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

<!-- Thông báo-->

<!-- Thông báo-->
        <!-- danh sách cán bộ -->
        
        <hr /><div class="tab-content">
            <div class="col-md-12">
                <div class="box box-success" style="border-top-color: #666;">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <a href="{$url}themcanbo" class="btn btn-primary btn-flat btm-sm"><span class="glyphicon glyphicon-plus"></span> Thêm cán bộ</a>
                            </div>
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <table id="example1" class="table example table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Tài khoản</th>
                                                <th class="text-center">Họ tên</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Tác vụ</th>
                                            </tr>
                                        </thead>
                                        {if !empty($danhsachcb)}
                                        <tbody>
                                            {$i=1}
                                            {foreach $danhsachcb as $list}
                                            <tr>
                                                <td class="text-center">{$i++}</td>
                                                <td class="text-center">{$list.sTaiKhoan}</td>
                                                <td>{$list.sTenCB}</td>
                                                <td>{$list.sEmail}</td>
                                                <td class="text-center">{$list.sNgaySinh}</td>
                                                <td class="text-center">{$list.sGioiTinh}</td>
                                                <td>{$list.sSDT}</td>
                                                <td class="text-center">
                                                    <a href="{$url}themcanbo?id={$list.PK_sMaCB}" type="submit" class="btn btn-xs btn-success btm-sm" title="Sửa"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                        {/if}
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->