<script src="{$url}assets/js/dethi/themdethi.js"></script>
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Báo cáo thống kê chi tiết
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Báo cáo thống kê chi tiết </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">      
        <div class="col-sm-12" style="margin-top:10px;">
            <div class="box box-success">
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Cán bộ thực hiện</th>
                                <th>Thời gian thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                        {if !empty($chitiet)}{$i=1}
                            {foreach $chitiet as $ct}
                                <tr>
                                    <td>{$i++}</td>
                                    <td>{$ct.sTenCB}</td>
                                    <td>{$ct.sThoiGian}</td>
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


