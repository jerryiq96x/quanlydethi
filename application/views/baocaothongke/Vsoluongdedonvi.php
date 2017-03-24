<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Số lượng đề thi đơn vị
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Trang chủ</li>
      <li class="active">Số lượng đề thi đơn vị</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-body"><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="get">
                                <div class="col-sm-5 col-sm-offset-5">
                                    <select name="donvi" id="" class="form-control select2" style="width:100%">
                                        <option value="">-- Chọn đơn vị --</option>
                                        {if !empty($dsdonvi)}
                                            {foreach $dsdonvi as $dv}
                                                <option value="{$dv.PK_iMaDonvi}" {($donvi)?($donvi==$dv.PK_iMaDonvi)?'selected':NULL:NULL}>{$dv.sTenDonvi}</option>
                                            {/foreach}
                                        {/if}
                                    </select>
                                </div>
                                <div class="col-sm-1"><button type="submit" class="btn btn-primary">Thống kê</button></div>
                                {if !empty($check)}<div class="col-sm-1" style="margin-top: -1px;"><button class="btn btn-success glyphicon glyphicon-download-alt" name="export" value="export" ></button></div>{/if}
                            </form>
                        </div>
                    </div>
                    <div class="row"><br>
                        <div class="col-sm-12">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Môn Học</th>
                                        <th>Hệ</th>
                                        <th>Số Đề</th>
                                        <th>Đề Chưa Sử Dụng</th>
                                        <th>Đề Đã Sử Dụng</th>
                                        <th>Đề Hủy: Chưa sử dụng</th>
                                        <th>Đề Hủy: Đã sử dụng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if !empty($dsmon)}{$i=1}
                                        {foreach $dsmon as $m}
                                            <tr>
                                                <td>{$i++}</td>
                                                <td>{$m.sTenMon}</td>
                                                <td>{$m.sTenHe}</td>
                                                <td>
                                                <b>
                                                    {if !empty($m.trangthai)}{$tong=0}
                                                        {foreach $m.trangthai as $tt}
                                                            {$tong=$tong+$tt.tong}
                                                        {/foreach}
                                                        {$tong}
                                                    {else}0{/if}
                                                </b>
                                                </td>
                                                <td>
                                                    {if !empty($m.trangthai)}{$giatri=0}
                                                        {foreach $m.trangthai as $tt}
                                                            {if $tt.PK_iMaTT==1}
                                                                {$giatri=$tt.tong}
                                                            {/if}
                                                        {/foreach}
                                                        {($giatri)?$giatri:0}
                                                    {else}0{/if}
                                                </td>
                                                <td>
                                                    {if !empty($m.trangthai)}{$giatri=0}
                                                        {foreach $m.trangthai as $tt}
                                                            {if $tt.PK_iMaTT==2}
                                                                {$giatri=$tt.tong}
                                                            {/if}
                                                        {/foreach}
                                                        {($giatri)?$giatri:0}
                                                    {else}0{/if}
                                                </td>
                                                <td>
                                                    {if !empty($m.trangthai)}{$giatri=0}
                                                        {foreach $m.trangthai as $tt}
                                                            {if $tt.PK_iMaTT==3}
                                                                {$giatri=$tt.tong}
                                                            {/if}
                                                        {/foreach}
                                                        {($giatri)?$giatri:0}
                                                    {else}0{/if}
                                                </td>
                                                <td>
                                                    {if !empty($m.trangthai)}{$giatri=0}
                                                        {foreach $m.trangthai as $tt}
                                                            {if $tt.PK_iMaTT==4}
                                                                {$giatri=$tt.tong}
                                                            {/if}
                                                        {/foreach}
                                                        {($giatri)?$giatri:0}
                                                    {else}0{/if}
                                                </td>
                                            </tr>
                                        {/foreach}
                                            <tr>
                                                <td style="border-right: none;"></td>
                                                <td style="text-align: center; border-left: none; border-right: none;"><b style="font-size: 18px">Tổng: </b></td>
                                                <td></td>
                                                <td>
                                                    <b>
                                                        {count($tongde)}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        {$dem = 0}
                                                        {foreach $tongde as $t}
                                                            {if $t.FK_iMaTT == 1}
                                                                {$dem = $dem+1}
                                                            {/if}
                                                        {/foreach}
                                                        {$dem}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        {$dem1 = 0}
                                                        {foreach $tongde as $t}
                                                            {if $t.FK_iMaTT == 2}
                                                                {$dem1 = $dem1+1}
                                                            {/if}
                                                        {/foreach}
                                                        {$dem1}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        {$dem2 = 0}
                                                        {foreach $tongde as $t}
                                                            {if $t.FK_iMaTT == 3}
                                                                {$dem2 = $dem2+1}
                                                            {/if}
                                                        {/foreach}
                                                        {$dem2}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        {$dem3 = 0}
                                                        {foreach $tongde as $t}
                                                            {if $t.FK_iMaTT == 4}
                                                                {$dem3 = $dem3+1}
                                                            {/if}
                                                        {/foreach}
                                                        {$dem3}
                                                    </b>
                                                </td>
                                            </tr>
                                    {/if}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


