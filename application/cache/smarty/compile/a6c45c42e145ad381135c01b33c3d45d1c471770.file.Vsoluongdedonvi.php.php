<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 02:12:19
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\baocaothongke\Vsoluongdedonvi.php" */ ?>
<?php /*%%SmartyHeaderCode:827081191586c5a03bd6838-81551520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6c45c42e145ad381135c01b33c3d45d1c471770' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\baocaothongke\\Vsoluongdedonvi.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '827081191586c5a03bd6838-81551520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dsdonvi' => 0,
    'dv' => 0,
    'donvi' => 0,
    'check' => 0,
    'dsmon' => 0,
    'i' => 0,
    'm' => 0,
    'tong' => 0,
    'tt' => 0,
    'giatri' => 0,
    'tongde' => 0,
    't' => 0,
    'dem' => 0,
    'dem1' => 0,
    'dem2' => 0,
    'dem3' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c5a03d9a4a4_40209244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c5a03d9a4a4_40209244')) {function content_586c5a03d9a4a4_40209244($_smarty_tpl) {?><div class="content-wrapper">

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
                                        <?php if (!empty($_smarty_tpl->tpl_vars['dsdonvi']->value)) {?>
                                            <?php  $_smarty_tpl->tpl_vars['dv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dsdonvi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dv']->key => $_smarty_tpl->tpl_vars['dv']->value) {
$_smarty_tpl->tpl_vars['dv']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['dv']->value['PK_iMaDonvi'];?>
" <?php echo $_smarty_tpl->tpl_vars['donvi']->value ? $_smarty_tpl->tpl_vars['donvi']->value==$_smarty_tpl->tpl_vars['dv']->value['PK_iMaDonvi'] ? 'selected' : null : null;?>
><?php echo $_smarty_tpl->tpl_vars['dv']->value['sTenDonvi'];?>
</option>
                                            <?php } ?>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="col-sm-1"><button type="submit" class="btn btn-primary">Thống kê</button></div>
                                <?php if (!empty($_smarty_tpl->tpl_vars['check']->value)) {?><div class="col-sm-1" style="margin-top: -1px;"><button class="btn btn-success glyphicon glyphicon-download-alt" name="export" value="export" ></button></div><?php }?>
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
                                    <?php if (!empty($_smarty_tpl->tpl_vars['dsmon']->value)) {
$_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dsmon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['sTenMon'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['sTenHe'];?>
</td>
                                                <td>
                                                <b>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['trangthai'])) {
$_smarty_tpl->tpl_vars['tong'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['trangthai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
                                                            <?php $_smarty_tpl->tpl_vars['tong'] = new Smarty_variable($_smarty_tpl->tpl_vars['tong']->value+$_smarty_tpl->tpl_vars['tt']->value['tong'], null, 0);?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['tong']->value;?>

                                                    <?php } else { ?>0<?php }?>
                                                </b>
                                                </td>
                                                <td>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['trangthai'])) {
$_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['trangthai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['tt']->value['PK_iMaTT']==1) {?>
                                                                <?php $_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable($_smarty_tpl->tpl_vars['tt']->value['tong'], null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['giatri']->value ? $_smarty_tpl->tpl_vars['giatri']->value : 0;?>

                                                    <?php } else { ?>0<?php }?>
                                                </td>
                                                <td>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['trangthai'])) {
$_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['trangthai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['tt']->value['PK_iMaTT']==2) {?>
                                                                <?php $_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable($_smarty_tpl->tpl_vars['tt']->value['tong'], null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['giatri']->value ? $_smarty_tpl->tpl_vars['giatri']->value : 0;?>

                                                    <?php } else { ?>0<?php }?>
                                                </td>
                                                <td>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['trangthai'])) {
$_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['trangthai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['tt']->value['PK_iMaTT']==3) {?>
                                                                <?php $_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable($_smarty_tpl->tpl_vars['tt']->value['tong'], null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['giatri']->value ? $_smarty_tpl->tpl_vars['giatri']->value : 0;?>

                                                    <?php } else { ?>0<?php }?>
                                                </td>
                                                <td>
                                                    <?php if (!empty($_smarty_tpl->tpl_vars['m']->value['trangthai'])) {
$_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['tt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['trangthai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tt']->key => $_smarty_tpl->tpl_vars['tt']->value) {
$_smarty_tpl->tpl_vars['tt']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['tt']->value['PK_iMaTT']==4) {?>
                                                                <?php $_smarty_tpl->tpl_vars['giatri'] = new Smarty_variable($_smarty_tpl->tpl_vars['tt']->value['tong'], null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['giatri']->value ? $_smarty_tpl->tpl_vars['giatri']->value : 0;?>

                                                    <?php } else { ?>0<?php }?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                                <td style="border-right: none;"></td>
                                                <td style="text-align: center; border-left: none; border-right: none;"><b style="font-size: 18px">Tổng: </b></td>
                                                <td></td>
                                                <td>
                                                    <b>
                                                        <?php echo count($_smarty_tpl->tpl_vars['tongde']->value);?>

                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        <?php $_smarty_tpl->tpl_vars['dem'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tongde']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['t']->value['FK_iMaTT']==1) {?>
                                                                <?php $_smarty_tpl->tpl_vars['dem'] = new Smarty_variable($_smarty_tpl->tpl_vars['dem']->value+1, null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['dem']->value;?>

                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        <?php $_smarty_tpl->tpl_vars['dem1'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tongde']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['t']->value['FK_iMaTT']==2) {?>
                                                                <?php $_smarty_tpl->tpl_vars['dem1'] = new Smarty_variable($_smarty_tpl->tpl_vars['dem1']->value+1, null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['dem1']->value;?>

                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        <?php $_smarty_tpl->tpl_vars['dem2'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tongde']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['t']->value['FK_iMaTT']==3) {?>
                                                                <?php $_smarty_tpl->tpl_vars['dem2'] = new Smarty_variable($_smarty_tpl->tpl_vars['dem2']->value+1, null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['dem2']->value;?>

                                                    </b>
                                                </td>
                                                <td>
                                                    <b>
                                                        <?php $_smarty_tpl->tpl_vars['dem3'] = new Smarty_variable(0, null, 0);?>
                                                        <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tongde']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value) {
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['t']->value['FK_iMaTT']==4) {?>
                                                                <?php $_smarty_tpl->tpl_vars['dem3'] = new Smarty_variable($_smarty_tpl->tpl_vars['dem3']->value+1, null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['dem3']->value;?>

                                                    </b>
                                                </td>
                                            </tr>
                                    <?php }?>
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


<?php }} ?>
