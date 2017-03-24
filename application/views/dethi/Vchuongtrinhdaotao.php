<script src="{$url}assets/js/dethi/chuongtrinhdaotao.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chương trình đào tạo
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quản lý đề thi</li>
        <li>Chương trình đào tạo</li>
        <li class="active">Chương trình đào tạo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <button name="chuongtrinhdaotao" class="btn btn-flat btn-primary" data-toggle="modal" href="#chuongtrinhdaotao"><span class="glyphicon glyphicon-plus"></span> Thêm CTĐT</button>
                        </div>
                        <div class="col-md-12" style="overflow-x:auto;"><br>
                            <table class="table table-bordered table-striped example">
                                <thead>
                                    <tr>
                                        <th style="width:5%" class="text-center">STT</th>
                                        <th style="width:25%">Đơn vị</th>
                                        <th style="width:25%">Ngành đào tạo</th>
                                        <th>Trình độ</th>
                                        <th style="width:20%">Hệ đào tạo</th>
                                        <th style="width:15%" class="text-center">Năm đào tạo</th>
                                        <th style="width:10%" class="text-center">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {if !empty($dsctdt)}{$i=1}
                                    {foreach $dsctdt as $ctdt}
                                    <tr>
                                        <td class="text-center">{$i++}</td>
                                        <td>{$ctdt.sTenDonvi}</td>
                                        <td>{$ctdt.sTenNganh}</td>
                                        <td>{$ctdt.sTentrinhdo}</td>
                                        <td>{$ctdt.sTenHe}</td>
                                        <td class="text-center">{$ctdt.iNam}</td>
                                        <td class="text-center">
                                            <button class="btn btn-xs btn-success" value="{$ctdt.PK_iMaCTDT}" name="sua" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-xs btn-primary" value="{$ctdt.PK_iMaCTDT}" data-placement="top" data-original-title="Thêm môn" name="capnhatmonhoc" data-toggle="modal" href="#capnhatmonhoc"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    {/foreach}
                                {/if}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal fade" id="chuongtrinhdaotao">
                            <div class="modal-dialog modal-md" style="width: 90%;">
                                <div class="modal-content">
                                    <form action="" id="chuongtrinhdaotaosubmit" method="post" autocomplete="off">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Cập nhật chương trình đào tạo</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Đơn vị</label>
                                                <select name="donvi" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn đơn vị --</option> -->
                                                    {if !empty($donvi)}
                                                    {foreach $donvi as $dv}
                                                        <option value="{$dv.PK_iMaDonvi}">{$dv.sTenDonvi}</option>
                                                    {/foreach}
                                                    {/if}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Ngành đào tạo</label>
                                                <select name="nganh" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn ngành đào tạo --</option> -->
                                                    {if !empty($nganhdaotao)}
                                                    {foreach $nganhdaotao as $nganh}
                                                        <option value="{$nganh.PK_iMaNganh}">{$nganh.sTenNganh}</option>
                                                    {/foreach}
                                                    {/if}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Trình độ:</label>
                                                <select name="trinhdo" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn ngành đào tạo --</option> -->
                                                    {if !empty($trinhdo)}
                                                    {foreach $trinhdo as $td}
                                                        <option value="{$td.PK_iMaTrinhdo}">{$td.sTentrinhdo}</option>
                                                    {/foreach}
                                                    {/if}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Hệ đào tạo</label>
                                                <select name="he" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn hệ đào tạo--</option> -->
                                                    {if !empty($hedaotao)}
                                                    {foreach $hedaotao as $he}
                                                        <option value="{$he.PK_iMaHe}">{$he.sTenHe}</option>
                                                    {/foreach}
                                                    {/if}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Năm bắt đầu</label>
                                                <select name="nam" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn hệ --</option> -->
                                                    {for $i=2013 to date('Y', time())}
                                                        <option value="{$i}" {if $i == date('Y', time())}selected=""{/if}>{$i}</option>
                                                    {/for}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><br/>
                                            <input type="text" name="ma" class="hide">
                                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Đóng</button>
                                            <button type="submit" name="capnhat" value="capnhat" class="btn btn-primary btn-flat">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal fade" id="capnhatmonhoc">
                            <div class="modal-dialog modal-lg" style="width: 95%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Cập nhật môn học theo chương trình đào tạo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" autocomplete="off">
                                            <div class="row mg-t">
                                                <div class="col-sm-5">
                                                    <label id="lbchuaxep" style="margin-bottom: 8px;margin-left: 30px;">Danh sách môn học(<span id="slchuaxep" style="font-size: 24px; color: green;">{$tongmon}</span> Môn )</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                                                        <input type="text" placeholder="Tìm kiếm môn..." name="searchbox" id="searchbox" class="form-control">
                                                    </div><br />
                                                    <div class="pre-scrollable" style="overflow-x: scroll;">
                                                        <table class="table table-bordered table-hover" id="chuaxep">
                                                            <thead>
                                                                <tr class="active">
                                                                    <th class="text-center" style="width:20%"><input type="checkbox" id="allchuaxep" /></th>
                                                                    <th class="text-center" style="width:65%">Môn học</th>
                                                                    <th class="text-center" style="width:15%">Số tín chỉ</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div> <!-- /.col-5 -->

                                                <!-- Nút chuyển -->
                                                <div class="col-md-2" style="margin-top: 96px; padding-left: 70px;">
                                                    <a><button type="button" class="btn btn-primary" id="sangphai"><span class="glyphicon glyphicon-arrow-right"></span></button></a> <br /> <br>
                                                    <a><button type="button" class="btn btn-primary" id="sangtrai"><span class="glyphicon glyphicon-arrow-left"></span></button></a>
                                                </div>
                                                        
                                                <div class="col-md-5">
                                                    <label id="lbdaxep" style="margin-bottom: 59px;margin-left: 30px;">Danh sách môn học đã xếp( <span id="sldaxep" style="font-size: 24px; color: green;">0</span> Môn )</label>
                                                    <div class="pre-scrollable" style="overflow-x: scroll;">
                                                        <table class="table table-bordered table-hover table-striped" id="daxep">
                                                            <thead>
                                                                <tr class="active">
                                                                    <th class="text-center" style="width:20%"><input type="checkbox" id="alldaxep" /></th>
                                                                    <th class="text-center" style="width:80%">Môn học</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- /.row -->
                                        </form>
                                    </div>

                                    <div class="modal-footer">  
                                        <input type="text" name="machuongtrinhdaotao" class="hide">
                                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Đóng</button>
                                        <button type="button" name="luucapnhatmon" id="luucapnhatmon" class="btn btn-primary btn-flat">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>