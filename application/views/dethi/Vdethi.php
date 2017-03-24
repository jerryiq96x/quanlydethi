<script type="text/javascript" src="{$url}assets/js/dethi/themdethi.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Đề thi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quản lý đề thi</li>
        <li>Đề thi</li>
        <li class="active">Đề thi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            <div class="box-body">
            <form action="" id="addForm" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            {if empty($kt)}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Đơn vị:</label>
                                    <select class="form-control" name="txtDV">
                                        <option>--Chọn đơn vị--</option>
                                        {foreach $listDV as $lDV}
                                            <option value="{$lDV.PK_iMaDonvi}">{$lDV.sTenDonvi}</option>
                                        {/foreach}
                                    </select>
                                    <span id="erDV" style="color: red; font-weight: bold;"></span>
                                </div>
                                <div class="form-group" id="dhe">
                                    <label for="">Hệ đào tạo:</label>
                                    <select class="form-control" disabled="">
                                        <option>--Chọn Hệ--</option>
                                    </select>
                                </div>
                                <div class="form-group" id="dnganh">
                                    <label for="">Ngành:</label>
                                    <select class="form-control" disabled="">
                                        <option>--Chọn ngành--</option>
                                    </select>
                                </div>
                                <div class="form-group" id="dtrinhdo">
                                    <label for="">Trình độ:</label>
                                    <select class="form-control" disabled="">
                                        <option>--Chọn trình độ--</option>
                                    </select>
                                </div>
                                <div class="form-group" id="dnam">
                                    <label for="">Năm:</label>
                                    <select class="form-control" disabled="">
                                        <option>--Chọn năm--</option>
                                    </select>
                                </div>
                                <div class="form-group" id="dmon">
                                    <label for="">Môn:</label>
                                    <select class="form-control" disabled="">
                                        <option>--Chọn môn--</option>
                                    </select>
                                </div>
                                <div class="form-group hide" id="dkhoaphu">
                                    <label for="">Mã khóa phụ:</label><br>
                                    <input class="form-control" type="text" name="txtKhoaphu" value="{if !empty($dataDe[0]["sMaKhoaPhu"])}{$dataDe[0]["sMaKhoaPhu"]}{/if}">
                                </div>
                                <span id="hd_inp"></span>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat pull-right" disabled="" type="submit" id="ok" name="{$bt_name}" value="{$bt_val}"><span class="glyphicon glyphicon-{$bt_icon}"></span> {$bt_text}</button>
                                    <a class="btn btn-default btn-flat pull-right" href="{$url}dsdethi"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                </div>
                            </div>
                            {else}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Đơn vị:</label>
                                    <select class="form-control" name="txtDV">
                                        <option>--Chọn đơn vị--</option>
                                        {foreach $listDV as $lDV}
                                            {if $dataDe[0]["FK_iMaHe"] == $lDV.PK_iMaHe}
                                                <option value="{$lDV.PK_iMaDonvi}" selected="">{$lDV.sTenDonvi}</option>
                                            {else}
                                                <option value="{$lDV.PK_iMaDonvi}">{$lDV.sTenDonvi}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="form-group" id="dhe">
                                    <label for="">Hệ đào tạo:</label>
                                    <select class="form-control" name="txtHe" disabled="">
                                        {if !empty($dataDe)}
                                            <option value="">{$dataDe[0]["sTenHe"]}</option>
                                        {/if}
                                    </select>
                                    <span id="erHe" style="color: red; font-weight: bold;"></span>
                                </div>
                                <div class="form-group" id="dnganh">
                                    <label for="">Ngành:</label>
                                    <select class="form-control" name="txtNganh"  disabled="">
                                        {if !empty($dataDe)}
                                        <option value="">{$dataDe[0]["sTenNganh"]}</option>
                                        {/if}
                                    </select>
                                </div>
                                <div class="form-group" id="dtrinhdo">
                                    <label for="">Trình độ:</label>
                                    <select class="form-control" name="txtTrinhdo"  disabled="">
                                        {if !empty($dataDe)}
                                        <option value="">{$dataDe[0]["sTentrinhdo"]}</option>
                                        {/if}
                                    </select>
                                </div>
                                <div class="form-group" id="dnam">
                                    <label for="">Năm:</label>
                                    <select class="form-control" name="txtNam" disabled="">
                                        {if !empty($dataDe)}
                                        <option value="">{$dataDe[0]["iNam"]}</option>
                                        {/if}
                                    </select>
                                </div>
                                <div class="form-group" id="dmon">
                                    <label for="">Môn:</label>
                                    <select class="form-control" name="txtMon" disabled="">
                                        {if !empty($dataDe)}
                                        <option value="">{$dataDe[0]["sTenMon"]}</option>
                                        {/if}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Mã khóa phụ:</label><br>
                                    <input class="form-control" type="text" name="txtKhoaphu" value="{if !empty($dataDe[0]["sMaKhoaPhu"])}{$dataDe[0]["sMaKhoaPhu"]}{/if}">
                                </div>
                                <span id="hd_inp"></span>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat pull-right" disabled="" type="submit" id="ok" name="{$bt_name}" value="{$bt_val}"><span class="glyphicon glyphicon-{$bt_icon}"></span> {$bt_text}</button>
                                    <a class="btn btn-default btn-flat pull-right" href="{$url}dsdethi"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                </div>
                            </div>{/if}
                            <div class="col-sm-6" >
                                <div class="col-sm-6">
                                    <div class="form-group" >
                                        <label for="" style="font-size: 1.5em;">Câu hỏi <b style="color: red">*</b>:</label><br>
                                        <label for="" id="chontep" style="font-size:8.0em;"><i class="fa  fa-file-text-o"></i> </label> <label for="" id="filename">{if !empty($dataDe[0]["sUpLoadDe"])}{$dataDe[0]["sUpLoadDe"]}{/if}</label>
                                        <input type="file" class="hide" name="filedethi" id="filedethi">
                                    </div>
                                </div>
                                <input type="text" name="hidden_rd" hidden="" id="codeRD">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" style="font-size: 1.5em;">Đáp án:</label><br>
                                        <label for="" id="chonDA" style="font-size:8.0em;"><i class="fa  fa-file-text-o"></i> </label> <label for="" id="filename2">{if !empty($dataDe[0]["sUpLoadDA"])}{$dataDe[0]["sUpLoadDA"]}{/if}</label>
                                        <input type="file" class="hide" name="filedapan" id="filedapan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>
</div>
<!--click chọn câu hỏi-->
{if empty($kt)}
<script>
    $(document).ready(function() {
    $(document).on("click","button[name=themde]",function(){
        var filename = $("#filedethi").val();
        if(filename.length==0)
        {
            $("#filename").html("Bạn chưa chọn file!");
            $("#filename").attr("style",  "color:red;");
            return false;
        }
    });
    //click chọn câu hỏi
    $(document).on("click","#chontep",function(){
        $("#filedethi").click();
    });
    $("#filedethi").change(function() {
        var filename = $("#filedethi").val().split("\\").pop();;
        $("#filename").html(filename);
        $("#filename").attr("style",  "color:black;");
    });
});
</script>
{else}
<script>
    $(document).on("click","#chontep",function(){
        $("#filedethi").click();
    });
    $(document).ready(function(){
        $("input[name=txtKhoaphu]").on("change",function(){
            
            $("#ok").removeAttr("disabled");
        });
    });
    $("#filedethi").change(function() {
        var filename = $("#filedethi").val().split("\\").pop();
        $("#ok").removeAttr("disabled");
        $("#filename").html(filename);
        $("#filename").attr("style",  "color:black;");
    });
</script>
{/if}
<!--click chọn đáp án-->
<script>
    
    $(document).on("click","#chonDA",function(){
        $("#filedapan").click();
    });

    $("#filedapan").change(function() {
        var filename = $("#filedapan").val().split("\\").pop();
        $("#ok").removeAttr("disabled");
        $("#filename2").html(filename);
        $("#filename2").attr("style",  "color:black;");
    });
</script>
<script>
    var x = Math.floor((Math.random() * 999999) + 100000);
    $("#codeRD").val(x);
</script>