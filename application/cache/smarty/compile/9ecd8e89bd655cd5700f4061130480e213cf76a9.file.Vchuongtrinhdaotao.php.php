<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-07 02:28:50
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\dethi\Vchuongtrinhdaotao.php" */ ?>
<?php /*%%SmartyHeaderCode:1274330122586c725b9e01c0-85460243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ecd8e89bd655cd5700f4061130480e213cf76a9' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\dethi\\Vchuongtrinhdaotao.php',
      1 => 1483756129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1274330122586c725b9e01c0-85460243',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c725bb0dd28_46522251',
  'variables' => 
  array (
    'url' => 0,
    'dsctdt' => 0,
    'i' => 0,
    'ctdt' => 0,
    'donvi' => 0,
    'dv' => 0,
    'nganhdaotao' => 0,
    'nganh' => 0,
    'hedaotao' => 0,
    'he' => 0,
    'tongmon' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c725bb0dd28_46522251')) {function content_586c725bb0dd28_46522251($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/dethi/chuongtrinhdaotao.js"><?php echo '</script'; ?>
>
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
                                        <th style="width:20%">Hệ đào tạo</th>
                                        <th style="width:15%" class="text-center">Năm đào tạo</th>
                                        <th style="width:10%" class="text-center">Tác vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($_smarty_tpl->tpl_vars['dsctdt']->value)) {
$_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars['ctdt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ctdt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dsctdt']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ctdt']->key => $_smarty_tpl->tpl_vars['ctdt']->value) {
$_smarty_tpl->tpl_vars['ctdt']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ctdt']->value['sTenDonvi'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ctdt']->value['sTenNganh'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ctdt']->value['sTenHe'];?>
</td>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['ctdt']->value['iNam'];?>
</td>
                                        <td class="text-center">
                                            <button class="btn btn-xs btn-success" value="<?php echo $_smarty_tpl->tpl_vars['ctdt']->value['PK_iMaCTDT'];?>
" name="sua" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-xs btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['ctdt']->value['PK_iMaCTDT'];?>
" data-placement="top" data-original-title="Thêm môn" name="capnhatmonhoc" data-toggle="modal" href="#capnhatmonhoc"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                <?php }?>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Đơn vị</label>
                                                <select name="donvi" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn đơn vị --</option> -->
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['donvi']->value)) {?>
                                                    <?php  $_smarty_tpl->tpl_vars['dv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['donvi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dv']->key => $_smarty_tpl->tpl_vars['dv']->value) {
$_smarty_tpl->tpl_vars['dv']->_loop = true;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['dv']->value['PK_iMaDonvi'];?>
"><?php echo $_smarty_tpl->tpl_vars['dv']->value['sTenDonvi'];?>
</option>
                                                    <?php } ?>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Ngành đào tạo</label>
                                                <select name="nganh" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn ngành đào tạo --</option> -->
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['nganhdaotao']->value)) {?>
                                                    <?php  $_smarty_tpl->tpl_vars['nganh'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nganh']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nganhdaotao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nganh']->key => $_smarty_tpl->tpl_vars['nganh']->value) {
$_smarty_tpl->tpl_vars['nganh']->_loop = true;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['nganh']->value['PK_iMaNganh'];?>
"><?php echo $_smarty_tpl->tpl_vars['nganh']->value['sTenNganh'];?>
</option>
                                                    <?php } ?>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Hệ đào tạo</label>
                                                <select name="he" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn hệ đào tạo--</option> -->
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['hedaotao']->value)) {?>
                                                    <?php  $_smarty_tpl->tpl_vars['he'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['he']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hedaotao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['he']->key => $_smarty_tpl->tpl_vars['he']->value) {
$_smarty_tpl->tpl_vars['he']->_loop = true;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['he']->value['PK_iMaHe'];?>
"><?php echo $_smarty_tpl->tpl_vars['he']->value['sTenHe'];?>
</option>
                                                    <?php } ?>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Năm bắt đầu</label>
                                                <select name="nam" class="form-control select2" style="width:100%;" id="">
                                                    <!-- <option value="">-- Chọn hệ --</option> -->
                                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? date('Y',time())+1 - (2013) : 2013-(date('Y',time()))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 2013, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['i']->value==date('Y',time())) {?>selected=""<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                                    <?php }} ?>
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
                                                    <label id="lbchuaxep" style="margin-bottom: 8px;margin-left: 30px;">Danh sách môn học(<span id="slchuaxep" style="font-size: 24px; color: green;"><?php echo $_smarty_tpl->tpl_vars['tongmon']->value;?>
</span> Môn )</label>
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
</div><?php }} ?>
