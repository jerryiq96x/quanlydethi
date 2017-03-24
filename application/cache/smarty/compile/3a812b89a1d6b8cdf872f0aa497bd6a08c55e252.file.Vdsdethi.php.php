<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 02:03:19
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\dethi\Vdsdethi.php" */ ?>
<?php /*%%SmartyHeaderCode:1168438629586c57e70b3042-06167907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a812b89a1d6b8cdf872f0aa497bd6a08c55e252' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\dethi\\Vdsdethi.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1168438629586c57e70b3042-06167907',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'listDethi' => 0,
    'i' => 0,
    'l' => 0,
    'listHe' => 0,
    'he' => 0,
    'listNganh' => 0,
    'nganh' => 0,
    'listMon' => 0,
    'mon' => 0,
    'listTT' => 0,
    'tt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c57e730f678_27222745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c57e730f678_27222745')) {function content_586c57e730f678_27222745($_smarty_tpl) {?><div class="content-wrapper">
	<section class="content-header">
      <h1>
        Danh sách đề thi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quản lý đề thi</li>
        <li>Đề thi</li>
        <li class="active">Danh sách đề thi</li>
      </ol>
    </section>

    <section class="content">
    	<div class="box">
    		<div class="box-body">
    			<div class="row">
    				<div class="col-sm-12" style="margin-bottom: 10px;">
    					<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dethi" class="btn btn-flat btn-primary"><span class="glyphicon glyphicon-plus"></span> Thêm đề thi</a>
    				</div><br>
    				<div class="col-sm-12">
    					<table class="table example table-bordered table-hover table-striped dataTable">
    						<thead>
    							<tr>
    								<td>STT</td>
    								<td>Mã Đề</td>
    								<td>Ngày tạo</td>
                                    <td>Hệ đào tạo</td>
                                    <td>Ngành</td>
    								<td>Môn học</td>
    								<td>Trạng thái</td>
    								<td>Tác vụ</td>
    							</tr>
    						</thead>
    						<tbody>
    						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
    						<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listDethi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
    							<tr>
    								<td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
    								<td><?php echo $_smarty_tpl->tpl_vars['l']->value['PK_sMaDT'];?>
</td>
    								<td><?php ob_start();?><?php echo date("d/m/Y",$_smarty_tpl->tpl_vars['l']->value['sThoiGian']);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</td>
                                    <td>
                                        <?php  $_smarty_tpl->tpl_vars['he'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['he']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listHe']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['he']->key => $_smarty_tpl->tpl_vars['he']->value) {
$_smarty_tpl->tpl_vars['he']->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['he']->value['PK_iMaHe']==$_smarty_tpl->tpl_vars['l']->value['FK_iMaHe']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['he']->value['sTenHe'];?>

                                            <?php }?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php  $_smarty_tpl->tpl_vars['nganh'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nganh']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listNganh']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nganh']->key => $_smarty_tpl->tpl_vars['nganh']->value) {
$_smarty_tpl->tpl_vars['nganh']->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['nganh']->value['PK_iMaNganh']==$_smarty_tpl->tpl_vars['l']->value['FK_iMaNganh']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['nganh']->value['sTenNganh'];?>

                                            <?php }?>
                                        <?php } ?>
                                    </td>
    								<td>
    									<?php  $_smarty_tpl->tpl_vars['mon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listMon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mon']->key => $_smarty_tpl->tpl_vars['mon']->value) {
$_smarty_tpl->tpl_vars['mon']->_loop = true;
?>
    										<?php if ($_smarty_tpl->tpl_vars['mon']->value['PK_iMaMon']==$_smarty_tpl->tpl_vars['l']->value['FK_iMaMon']) {?>
    											<?php echo $_smarty_tpl->tpl_vars['mon']->value['sTenMon'];?>

    										<?php }?>
    									<?php } ?>
    								</td>
    								<td style="text-align: center;">
    								<?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listTT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
    										<?php if ($_smarty_tpl->tpl_vars['tt']->value['PK_iMaTT']==$_smarty_tpl->tpl_vars['l']->value['FK_iMaTT']) {?>
    											<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="1") {?>
    												<label class="label label-success" style="font-size: 1.0em;"><?php echo $_smarty_tpl->tpl_vars['tt']->value['sTenTT'];?>

    												</label>
    											<?php } else { ?>
    												<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="2") {?>
    												<label class="label label-warning" data-toggle="tooltip" title="Đã sử dụng: <?php echo $_smarty_tpl->tpl_vars['l']->value['sNgaySuDung'];?>
" style="font-size: 1.0em;"><?php echo $_smarty_tpl->tpl_vars['tt']->value['sTenTT'];?>

    												</label>
                                                    <?php } else { ?>
                                                        <?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="3") {?>
                                                            <label class="label label-danger" style="font-size: 1.0em;"><?php echo $_smarty_tpl->tpl_vars['tt']->value['sTenTT'];?>

                                                            </label>
                                                        <?php } else { ?>
                                                            <label class="label label-danger" data-toggle="tooltip" title="Đã sử dụng: <?php echo $_smarty_tpl->tpl_vars['l']->value['sNgaySuDung'];?>
" style="font-size: 1.0em;"><?php echo $_smarty_tpl->tpl_vars['tt']->value['sTenTT'];?>

                                                            </label>
                                                        <?php }?>
                                                    <?php }?>
    											<?php }?>
    										<?php }?>
    									<?php } ?>

    								</td>
    								<td style="text-align: center;">
                                        
    									<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off">
                                        <?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="1") {?>
    										<a class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Sửa" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dethi?id=<?php echo $_smarty_tpl->tpl_vars['l']->value['PK_sMaDT'];?>
"><i class="fa fa-edit"></i></a>
                                        <?php }?>
                                        <?php if (($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="1")||($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="2")) {?>
                                            <button type="submit" name="<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="1") {?>huydechuadung<?php } else {
if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="2") {?>huydedadung<?php }
}?>" data-toggle="tooltip" data-original-title="<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="1") {?>Hủy đề chưa dùng<?php } else {
if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="2") {?>Hủy đề đã dùng<?php }
}?>" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['PK_sMaDT'];?>
" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                        <?php } else { ?>
                                            <button type="submit" name="<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="3") {?>recoverchuadung<?php } else {
if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="4") {?>recoverdadung<?php }
}?>" data-toggle="tooltip" data-original-title="<?php if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="3") {?>Khôi phục đề chưa dùng<?php } else {
if ($_smarty_tpl->tpl_vars['l']->value['PK_iMaTT']=="4") {?>Khôi phục đề đã dùng<?php }
}?>" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['PK_sMaDT'];?>
" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-refresh"></span></button>
                                        <?php }?>

    									</form>
                                    
    								</td>
    							</tr>
    						<?php } ?>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
</div><?php }} ?>
