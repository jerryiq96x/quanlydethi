<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục địa điểm thi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục địa điểm thi </li>
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
                            <label>Tên địa điểm</label>
                            <input type="text" id="tendonvi" value="{($diadiem) ? $diadiem[0]['sTenDV'] : NULL}" required="" class="form-control" name="tendonvi" placeholder="Tên địa điểm.."><br>
                            <label>Địa điểm</label>
                            <input type="text" id="diadiem" value="{($diadiem) ? $diadiem[0]['sdiadiem'] : NULL}" required="" class="form-control" name="diadiem" placeholder="Địa điểm..">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="{if !empty($diadiem)}{$diadiem[0]['PK_iMaDV']}{/if}">
                        </div>
                        <button type="submit" name="{$button_name}" value="{$button_value}" class="btn btn-primary btn-flat">{$button_value}</button>
                        {if $button_name == 'capnhatdiadiem'}
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        {/if}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách địa điểm</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên địa điểm</th>
                                <th class="text-center">Địa điểm</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             {if !empty($danhsachdiadiem)}
                            <tbody>
                                {$i=1}
                                {foreach $danhsachdiadiem as $dd}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td>{$dd.sTenDV}</td>
                                        <td>{$dd.sdiadiem}</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suadiadiem" value="{$dd.PK_iMaDV}" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-flat btn-sm" name="xoadiadiem" value="{$dd.PK_iMaDV}" title="Xóa" onclick="return confirm('Xóa địa điểm {$dd.sTenDV}?');"><i class="fa fa-trash-o"></i></button> -->
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


