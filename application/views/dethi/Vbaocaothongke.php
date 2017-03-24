<script src="{$url}assets/js/dethi/themdethi.js"></script>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Báo cáo thống kê
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Báo cáo thống kê </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
<!-- Thông báo-->
            
<!-- Thông báo-->
        <div style="margin-bottom: 10px;">
            <form action="" method="get">
                <div class="col-sm-2">
                    <label for="">Chọn Hệ đào tạo:</label>
                    <select name="txtHe" id="" class="form-control">
                        <option value=""> -- Chọn hệ --</option>
                        {if !empty($he)}
                            {foreach $he as $h}
                                <option value="{$h.PK_iMaHe}" {($listHe2)?($listHe2[0]['PK_iMaHe']==$h.PK_iMaHe)?selected:NULL:NULL}>{$h.sTenHe}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
                <div class="col-sm-3" id="dnganh">
                    <label for="">Chọn Ngành:</label>
                     <select name="txtNganh" id="" class="form-control">
                         <option value=""> -- Chọn ngành --</option>
                         {if !empty($listNganh)}
                            <option value="" selected="">{$listNganh[0]['sTenNganh']}</option>
                         {/if}
                     </select>
                </div>
                <div class="col-sm-2" id="dnam">
                     <label for="">Chọn Năm:</label>
                     <select name="txtNam" id="" class="form-control">
                         <option value=""> -- Chọn năm --</option>
                         {if !empty($listNam)}
                            <option value="" selected="">{$listNam}</option>
                         {/if}
                     </select>
                </div>
                <div class="col-sm-3" id="dmon">
                    <label for="">Chọn Môn:</label>
                     <select name="txtMon" id="" class="form-control">
                         <option value=""> -- Chọn môn --</option>
                         {if !empty($listMon)}
                            <option value="" selected="">{$listMon[0]['sTenMon']}</option>
                         {/if}
                     </select>
                </div>
                <span id="hd_inp"></span>
                <div class="col-sm-1" style="margin-top: 5px;">
                <label for=""></label>
                    <button name="submit" class="btn btn-primary" id="ok"  disabled="" type="submit" value="submit">Thống kê</button>
                </div>
            </form>
            
        </div>
        <div class="col-sm-12" style="margin-top:10px;">
            <div class="box box-success">
                <div class="box-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width:8%" class="text-center">STT</th>
                                <th>Trạng thái đề thi</th>
                                <th>Số lượng</th>
                                <th style="width:15%" class="text-center">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            {if !empty($thongke)}{$i=1}
                                {foreach $thongke as $tk}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td><b>{$tk.sTenTT}</b></td>
                                        <td>{$tk.tong}</td>
                                        <td class="text-center">
                                            {if $tk.tong >0}<a href="{$url}chitietthongke/{$tk.PK_iMaTT}/{$mamonctdt[0]['PK_iMaMonCTDT']}" target="_blank" title="Chi tiết" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>{else}#{/if}
                                        </td>
                                    </tr>
                                {/foreach}
                            {/if}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


