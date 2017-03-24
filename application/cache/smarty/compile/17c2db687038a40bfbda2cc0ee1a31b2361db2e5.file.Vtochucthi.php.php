<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 08:31:12
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\tochucthi\Vtochucthi.php" */ ?>
<?php /*%%SmartyHeaderCode:193528598586c7187ae1aa6-75919776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c2db687038a40bfbda2cc0ee1a31b2361db2e5' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\tochucthi\\Vtochucthi.php',
      1 => 1483518652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193528598586c7187ae1aa6-75919776',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c7187c012c3_44678863',
  'variables' => 
  array (
    'url' => 0,
    'dsdeboc' => 0,
    'i' => 0,
    'ds' => 0,
    'diadiem' => 0,
    'dd' => 0,
    'mondaotao' => 0,
    'mdt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c7187c012c3_44678863')) {function content_586c7187c012c3_44678863($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/tochucthi/tochucthi.js"><?php echo '</script'; ?>
>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tổ chức thi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quản lý đề thi</li>
        <li>Quản lý tổ chức thi</li>
        <li class="active">Tổ chức thi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div>
                  <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Danh sách đề đã bốc</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bốc đề thi</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home"><br />
                            <table class="table table-hover table-bordered example dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:5%">STT</th>
                                        <th style="width: 20%;">Ngày bốc</th>
                                        <th>Ghi chú</th>
                                        <th style="width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dsdeboc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value) {
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php ob_start();?><?php echo date("d/m/Y",$_smarty_tpl->tpl_vars['ds']->value['FK_sNgayBoc']);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['sGhiChu'];?>
</td>
                                        <td class="text-center">
                                            <button class="btn btn-xs btn-info bt_info" type="button" name="info" value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['FK_sNgayBoc'];?>
" href="#dsde" data-toggle="modal" title="Chi tiết"><span class="glyphicon glyphicon-info-sign"></span></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile"><br>
                            <form action="" name="formtochucthi" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <select name="diadiemthi[]" class="form-control select2" multiple="multiple" style="width:100%;" id="">
                                                    <option value="">-- Chọn địa điểm thi --</option>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['diadiem']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['dd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diadiem']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dd']->key => $_smarty_tpl->tpl_vars['dd']->value) {
$_smarty_tpl->tpl_vars['dd']->_loop = true;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['dd']->value['PK_iMaDV'];?>
"><?php echo $_smarty_tpl->tpl_vars['dd']->value['sTenDV'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dd']->value['sdiadiem'];?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
                                                </select>
                                                <label id="diadiemthi-error" class="error" for="diadiemthi"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <select name="monchuongtrinhdaotao" class="form-control select2" style="width:100%;" id="">
                                                    <option value="">-- Chọn môn chương trình đào tạo --</option>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['mondaotao']->value)) {?>
                                                        <?php  $_smarty_tpl->tpl_vars['mdt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mdt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mondaotao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mdt']->key => $_smarty_tpl->tpl_vars['mdt']->value) {
$_smarty_tpl->tpl_vars['mdt']->_loop = true;
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['mdt']->value['FK_iMaMonCTDT'];?>
"><?php echo $_smarty_tpl->tpl_vars['mdt']->value['sTenHe'];?>
 - <?php echo $_smarty_tpl->tpl_vars['mdt']->value['sTenNganh'];?>
 - <?php echo $_smarty_tpl->tpl_vars['mdt']->value['iNam'];?>
 - <?php echo $_smarty_tpl->tpl_vars['mdt']->value['sTenMon'];?>
</option>
                                                        <?php } ?>
                                                    <?php }?>
                                                </select>
                                                <label id="monchuongtrinhdaotao-error" class="error" for="monchuongtrinhdaotao"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="" id="txttong"></label> <label for="" id="tongso"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="thoigianthi">Thời gian thi:</label>
                                                <input type="text" name="thoigianthi" class="form-control inputmast" placeholder="dd/mm/yyyy hh:mm" >
                                                <label id="thoigianthi-error" class="error" for="thoigianthi"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="sodeboc">Số đề bốc:</label>
                                                <input type="text" name="sodeboc" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <br>
                                                <button style="margin-top: 4px;" type="button" name="bocde" class="btn btn-primary">Bốc đề</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-10">
                                            <table class="table table-bordered ketqua hide">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:5%">STT</th>
                                                        <th style="width:50%">Mã đề</th>
                                                        <th style="width:30%">Phòng thi</th>
                                                        <th style="width:20%">Số lượng đề</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-10 hide" id="ghichu">
                                            <label>Ghi chú:</label>
                                            <textarea name="ghichu" class="form-control" rows="5" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <div class="col-sm-10">
                                            <button type="button" name="luutochucthi" value="luutochithi" class="hide btn btn-primary pull-right">Lưu thông tin</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!--Modal-->
<div class="modal fade" id="dsde">
    <div class="modal-dialog modal-xs" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Danh sách đề thi</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:5%">STT</th>
                            <th style="width:10%">Mã đề</th>
                            <th style="width:30%">Môn chương trình đào tạo</th>
                            <th style="width:15%">Thời gian thi</th>
                            <th style="width:15%">Phòng thi</th>
                            <th style="width:10%">Số lượng đề</th>
                            <th style="width:15%">Người bốc đề</th>
                            <th class="text-center" style="width:10%">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody id="body_dsde">
                        
                    </tbody>
                </table>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div><?php }} ?>
