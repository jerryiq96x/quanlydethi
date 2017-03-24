<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-05 09:34:58
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\danhmuc\Vmonhoc.php" */ ?>
<?php /*%%SmartyHeaderCode:1681361018586c7254ad60f8-16682047%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5c4c07be2b7fdd3d368b5f6f110d7795168b0d4' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\danhmuc\\Vmonhoc.php',
      1 => 1483608896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1681361018586c7254ad60f8-16682047',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c7254bb47a9_63471852',
  'variables' => 
  array (
    'mon' => 0,
    'button_name' => 0,
    'button_value' => 0,
    'danhsachmon' => 0,
    'i' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c7254bb47a9_63471852')) {function content_586c7254bb47a9_63471852($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục môn học
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục môn học </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
<!-- Thông báo-->
            
<!-- Thông báo-->
        <div class="col-md-4">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Tên môn</label>
                            <input type="text" id="tenmon" value="<?php echo $_smarty_tpl->tpl_vars['mon']->value ? $_smarty_tpl->tpl_vars['mon']->value[0]['sTenMon'] : null;?>
" class="form-control" required="" name="tenmon" placeholder="Tên môn..">
                           <!--  <label>Mật khẩu</label> -->
                            
                        </div>
                        <div class="form-group">
                            <label>Tên Khác: </label>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mon']->value ? $_smarty_tpl->tpl_vars['mon']->value[0]['sTenKhac'] : null;?>
" class="form-control" name="tenmonkhac" placeholder="Tên khác..">
                        </div>
                        <div class="form-group">
                            <label>Số tín chỉ: </label>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['mon']->value ? $_smarty_tpl->tpl_vars['mon']->value[0]['sSotinchi'] : null;?>
" class="form-control" name="tinchi" placeholder="Số tín chỉ...">
                        </div>
                        <button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
" class="btn btn-primary btn-flat"><?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
</button>
                        <?php if ($_smarty_tpl->tpl_vars['button_name']->value=='capnhatmon') {?>
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        <?php }?>
                        <input type="hidden" name="hidden_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['mon']->value)) {
echo $_smarty_tpl->tpl_vars['mon']->value[0]['PK_iMaMon'];
}?>"><br/>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách môn học</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên môn</th>
                                <th class="text-center">Tên khác</th>
                                <th class="text-center">Số tín chỉ</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             <?php if (!empty($_smarty_tpl->tpl_vars['danhsachmon']->value)) {?>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danhsachmon']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value) {
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dt']->value['sTenMon'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dt']->value['sTenKhac'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dt']->value['sSotinchi'];?>
</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suamon" value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['PK_iMaMon'];?>
" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoamon" value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['PK_iMaMon'];?>
" title="Xóa" onclick="return confirm('Xóa môn <?php echo $_smarty_tpl->tpl_vars['dt']->value['sTenMon'];?>
?');"><span class="glyphicon glyphicon-trash"></span></button> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <?php }?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php }} ?>
