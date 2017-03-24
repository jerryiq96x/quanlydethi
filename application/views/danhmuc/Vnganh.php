<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục ngành học
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục ngành học </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
<!-- Thông báo-->
            
<!-- Thông báo-->
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Tên ngành</label>
                            <input type="text" id="tennganh" value="{if !empty($listEdit)}{$listEdit[0]['sTenNganh']}{/if}" class="form-control" name="tennganh" required="" placeholder="Tên ngành..">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="{if !empty($listEdit)}{$listEdit[0]['PK_iMaNganh']}{/if}">
                        </div>
                        <button type="submit" name="{$button_name}" value="{$button_value}" class="btn btn-primary btn-flat">{$button_value}</button>
                        {if $button_name == 'capnhatnganh'}
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        {/if}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách ngành</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên ngành</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             {if !empty($danhsachnganh)}
                            <tbody>
                                {$i=1}
                                {foreach $danhsachnganh as $dt}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td>{$dt.sTenNganh}</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suanganh" value="{$dt.PK_iMaNganh}" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoanganh" value="{$dt.PK_iMaNganh}" title="Xóa" onclick="return confirm('Xóa ngành {$dt.sTenNganh}?');"><i class="fa fa-trash-o"></i></button> -->
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


