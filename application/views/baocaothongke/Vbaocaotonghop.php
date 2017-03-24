<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Báo cáo tổng hợp
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Trang chủ</li>
      <li class="active">Báo cáo tổng hợp</li>
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
                            <form action="" method="get" name="form-thongke" autocomplete="off">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="batdau">Thời gian bắt đầu</label>
                                        <input type="text" name="batdau" class="form-control" value="{($batdau)?$batdau:NULL}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                                        <label for="" id="batdau-error"></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label for="ketthuc">Thời gian kết thúc</label>
                                    <input type="text" name="ketthuc" class="form-control" value="{($ketthuc)?$ketthuc:NULL}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                                    <label for="" id="ketthuc-error"></label>
                                </div>
                                <div class="col-sm-2">
                                    <br/>
                                    <button name="thongke" value="thongke" style="margin-top: 4px;" type="submit" class="btn btn-primary">Thống kê</button>
                                    <button class="btn btn-success glyphicon glyphicon-download-alt" name="in" value="in" ></button>
                                    <!-- <button name="in" value="in" style="margin-top: 4px;" class="btn btn-success glyphicon glyphicon-download-alt">In</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khoa</th>
                                        <th>Số môn</th>
                                        <th>Số lượng đề còn lại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {if !empty($thongke)}{$i=1}
                                            {foreach $thongke as $tk}
                                                <tr>
                                                    <td>{$i++}</td>
                                                    <td>{$tk.sTenDonvi}</td>
                                                    <td>{$tk.tongmon}</td>
                                                    <td>{$tk.tong}</td>
                                                </tr>
                                            {/foreach}
                                        {/if}
                                        {if !empty($thongke)}
                                        <tr>
                                            <td style="border-right: none;"></td>
                                            <td style="text-align: center;"><b style="font-size: 18px;">Tổng</b></td>
                                            <td>
                                                <b style="font-size: 18px;">
                                                
                                                    {$tong = 0}
                                                    {foreach $thongke as $tk}
                                                        {$tong = $tong+$tk.tongmon}
                                                    {/foreach}
                                                    {$tong}
                                                
                                                </b>
                                            </td>
                                            <td>
                                                <b style="font-size: 18px;">
                                                    {$tong1 = 0}
                                                    {foreach $thongke as $tk}
                                                        {$tong1 = $tong1+$tk.tong}
                                                    {/foreach}
                                                    {$tong1}
                                                </b>
                                            </td>
                                        </tr>
                                        {/if}
                                    </tr>
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
<script>
    $(document).ready(function() {
        $("form[name=form-thongke]").validate({

            // Specify the validation rules
            rules: {
                batdau: "required",
                ketthuc:"required"
            },
            // Specify the validation error messages
            messages: {
                batdau: "Ngày bắt đầu không được để trống",
                ketthuc:"Ngày kết thúc không được để trống"
            },
        });
        $(document).on('click','button[name=thongke]',function(){
            var batdau  =$('input[name=batdau]').val();
            var ketthuc =$('input[name=ketthuc]').val();
            if(parseInt(ketthuc.search('y'))>1)
            {
                $('#ketthuc-error').html('Thời gian bắt đầu chưa đúng định dạng');
                $('#ketthuc-error').prop('style','display: block;')
                return false;
            }
            if(parseInt(batdau.search('y'))>1)
            {
                $('#batdau-error').html('Thời gian kết thúc chưa đúng định dạng');
                $('#batdau-error').prop('style','display: block;')
                return false;
            }
        });
    });
</script>


