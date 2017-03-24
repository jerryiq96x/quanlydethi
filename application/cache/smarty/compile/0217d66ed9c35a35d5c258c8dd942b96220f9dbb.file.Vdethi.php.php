<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-06 02:11:10
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\dethi\Vdethi.php" */ ?>
<?php /*%%SmartyHeaderCode:1490663645586c57e46a1443-09864630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0217d66ed9c35a35d5c258c8dd942b96220f9dbb' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\dethi\\Vdethi.php',
      1 => 1483668668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1490663645586c57e46a1443-09864630',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c57e47b0957_94238079',
  'variables' => 
  array (
    'url' => 0,
    'kt' => 0,
    'listDV' => 0,
    'lDV' => 0,
    'dataDe' => 0,
    'bt_name' => 0,
    'bt_val' => 0,
    'bt_icon' => 0,
    'bt_text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c57e47b0957_94238079')) {function content_586c57e47b0957_94238079($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/dethi/themdethi.js"><?php echo '</script'; ?>
>
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
                            <?php if (empty($_smarty_tpl->tpl_vars['kt']->value)) {?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Đơn vị:</label>
                                    <select class="form-control" name="txtDV">
                                        <option>--Chọn đơn vị--</option>
                                        <?php  $_smarty_tpl->tpl_vars['lDV'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lDV']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listDV']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lDV']->key => $_smarty_tpl->tpl_vars['lDV']->value) {
$_smarty_tpl->tpl_vars['lDV']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['lDV']->value['PK_iMaDonvi'];?>
"><?php echo $_smarty_tpl->tpl_vars['lDV']->value['sTenDonvi'];?>
</option>
                                        <?php } ?>
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
                                    <input class="form-control" type="text" name="txtKhoaphu" value="<?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value[0]["sMaKhoaPhu"])) {
echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sMaKhoaPhu"];
}?>">
                                </div>
                                <span id="hd_inp"></span>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat pull-right" disabled="" type="submit" id="ok" name="<?php echo $_smarty_tpl->tpl_vars['bt_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['bt_val']->value;?>
"><span class="glyphicon glyphicon-<?php echo $_smarty_tpl->tpl_vars['bt_icon']->value;?>
"></span> <?php echo $_smarty_tpl->tpl_vars['bt_text']->value;?>
</button>
                                    <a class="btn btn-default btn-flat pull-right" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dsdethi"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Đơn vị:</label>
                                    <select class="form-control" name="txtDV">
                                        <option>--Chọn đơn vị--</option>
                                        <?php  $_smarty_tpl->tpl_vars['lDV'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lDV']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listDV']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lDV']->key => $_smarty_tpl->tpl_vars['lDV']->value) {
$_smarty_tpl->tpl_vars['lDV']->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['dataDe']->value[0]["FK_iMaHe"]==$_smarty_tpl->tpl_vars['lDV']->value['PK_iMaHe']) {?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['lDV']->value['PK_iMaDonvi'];?>
" selected=""><?php echo $_smarty_tpl->tpl_vars['lDV']->value['sTenDonvi'];?>
</option>
                                            <?php } else { ?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['lDV']->value['PK_iMaDonvi'];?>
"><?php echo $_smarty_tpl->tpl_vars['lDV']->value['sTenDonvi'];?>
</option>
                                            <?php }?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group" id="dhe">
                                    <label for="">Hệ đào tạo:</label>
                                    <select class="form-control" name="txtHe" disabled="">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value)) {?>
                                            <option value=""><?php echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sTenHe"];?>
</option>
                                        <?php }?>
                                    </select>
                                    <span id="erHe" style="color: red; font-weight: bold;"></span>
                                </div>
                                <div class="form-group" id="dnganh">
                                    <label for="">Ngành:</label>
                                    <select class="form-control" name="txtNganh"  disabled="">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value)) {?>
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sTenNganh"];?>
</option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group" id="dnam">
                                    <label for="">Năm:</label>
                                    <select class="form-control" name="txtNam" disabled="">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value)) {?>
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["iNam"];?>
</option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group" id="dmon">
                                    <label for="">Môn:</label>
                                    <select class="form-control" name="txtMon" disabled="">
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value)) {?>
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sTenMon"];?>
</option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Mã khóa phụ:</label><br>
                                    <input class="form-control" type="text" name="txtKhoaphu" value="<?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value[0]["sMaKhoaPhu"])) {
echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sMaKhoaPhu"];
}?>">
                                </div>
                                <span id="hd_inp"></span>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat pull-right" disabled="" type="submit" id="ok" name="<?php echo $_smarty_tpl->tpl_vars['bt_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['bt_val']->value;?>
"><span class="glyphicon glyphicon-<?php echo $_smarty_tpl->tpl_vars['bt_icon']->value;?>
"></span> <?php echo $_smarty_tpl->tpl_vars['bt_text']->value;?>
</button>
                                    <a class="btn btn-default btn-flat pull-right" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dsdethi"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                </div>
                            </div><?php }?>
                            <div class="col-sm-6" >
                                <div class="col-sm-6">
                                    <div class="form-group" >
                                        <label for="" style="font-size: 1.5em;">Câu hỏi <b style="color: red">*</b>:</label><br>
                                        <label for="" id="chontep" style="font-size:8.0em;"><i class="fa  fa-file-text-o"></i> </label> <label for="" id="filename"><?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value[0]["sUpLoadDe"])) {
echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sUpLoadDe"];
}?></label>
                                        <input type="file" class="hide" name="filedethi" id="filedethi">
                                    </div>
                                </div>
                                <input type="text" name="hidden_rd" hidden="" id="codeRD">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" style="font-size: 1.5em;">Đáp án:</label><br>
                                        <label for="" id="chonDA" style="font-size:8.0em;"><i class="fa  fa-file-text-o"></i> </label> <label for="" id="filename2"><?php if (!empty($_smarty_tpl->tpl_vars['dataDe']->value[0]["sUpLoadDA"])) {
echo $_smarty_tpl->tpl_vars['dataDe']->value[0]["sUpLoadDA"];
}?></label>
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
<?php if (empty($_smarty_tpl->tpl_vars['kt']->value)) {?>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php } else { ?>
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php }?>
<!--click chọn đáp án-->
<?php echo '<script'; ?>
>
    
    $(document).on("click","#chonDA",function(){
        $("#filedapan").click();
    });

    $("#filedapan").change(function() {
        var filename = $("#filedapan").val().split("\\").pop();
        $("#ok").removeAttr("disabled");
        $("#filename2").html(filename);
        $("#filename2").attr("style",  "color:black;");
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var x = Math.floor((Math.random() * 999999) + 100000);
    $("#codeRD").val(x);
<?php echo '</script'; ?>
><?php }} ?>
