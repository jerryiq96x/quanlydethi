<div class="content-wrapper">

  <section class="content-header">
    <h1>
      {$title}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">{$title} </li>
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
                            <label>Tên Đơn vị</label>
                            <input type="text" id="tendonvi" value="{(!empty($khoa)) ? $khoa[0]['sTenDonvi'] : NULL}" required="" class="form-control" name="tendonvi" placeholder="Tên khoa...">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="{if !empty($idsua)}{$idsua}{/if}">
                        </div>
                        <button type="submit" name="{$button_name}" value="{$button_value}" class="btn btn-primary btn-flat">{$button_value}</button>
                        {if $button_name == 'capnhatkhoa'}
                            <a href="{$url}khoa" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</a>
                        {/if}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách khoa thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên khoa</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             {if !empty($listEdit)}
                            <tbody>
                                {$i=1}
                                {foreach $listEdit as $l}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td>{$l.sTenDonvi}</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suakhoa" value="{$l.PK_iMaDonvi}" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoamon" value="{$dt.PK_iMaMon}" title="Xóa" onclick="return confirm('Xóa môn {$dt.stendonvi}?');"><span class="glyphicon glyphicon-trash"></span></button> -->
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


