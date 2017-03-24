<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục môn học
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục môn học </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
<!-- Thông báo-->
            
<!-- Thông báo-->
        <div class="col-md-4">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Tên môn</label>
                            <input type="text" id="tenmon" value="{($mon) ? $mon[0]['sTenMon'] : NULL}" class="form-control" required="" name="tenmon" placeholder="Tên môn..">
                           <!--  <label>Mật khẩu</label> -->
                            
                        </div>
                        <div class="form-group">
                            <label>Tên Khác: </label>
                            <input type="text" value="{($mon) ? $mon[0]['sTenKhac'] : NULL}" class="form-control" name="tenmonkhac" placeholder="Tên khác..">
                        </div>
                        <div class="form-group">
                            <label>Số tín chỉ: </label>
                            <input type="text" value="{($mon) ? $mon[0]['sSotinchi'] : NULL}" class="form-control" name="tinchi" placeholder="Số tín chỉ...">
                        </div>
                        <button type="submit" name="{$button_name}" value="{$button_value}" class="btn btn-primary btn-flat">{$button_value}</button>
                        {if $button_name == 'capnhatmon'}
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        {/if}
                        <input type="hidden" name="hidden_id" value="{if !empty($mon)}{$mon[0]['PK_iMaMon']}{/if}"><br/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên môn</th>
                                <th class="text-center">Tên khác</th>
                                <th class="text-center">Số tín chỉ</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             {if !empty($danhsachmon)}
                            <tbody>
                                {$i=1}
                                {foreach $danhsachmon as $dt}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td>{$dt.sTenMon}</td>
                                        <td>{$dt.sTenKhac}</td>
                                        <td>{$dt.sSotinchi}</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suamon" value="{$dt.PK_iMaMon}" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoamon" value="{$dt.PK_iMaMon}" title="Xóa" onclick="return confirm('Xóa môn {$dt.sTenMon}?');"><span class="glyphicon glyphicon-trash"></span></button> -->
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
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


