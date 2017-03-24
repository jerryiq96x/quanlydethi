<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-05 09:43:49
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\danhmuc\Vdiadiem.php" */ ?>
<?php /*%%SmartyHeaderCode:1741436316586c9e568dcb28-80398288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3681027ab592bcfe6e2bdf3a9615e606a04fbcbe' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\danhmuc\\Vdiadiem.php',
      1 => 1483609428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1741436316586c9e568dcb28-80398288',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c9e569ccd48_94118439',
  'variables' => 
  array (
    'diadiem' => 0,
    'button_name' => 0,
    'button_value' => 0,
    'danhsachdiadiem' => 0,
    'i' => 0,
    'dd' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c9e569ccd48_94118439')) {function content_586c9e569ccd48_94118439($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục địa điểm thi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục địa điểm thi </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
<!-- Thông báo-->
            
<!-- Thông báo-->
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="form-group">
                            <label>Tên địa điểm</label>
                            <input type="text" id="tendonvi" value="<?php echo $_smarty_tpl->tpl_vars['diadiem']->value ? $_smarty_tpl->tpl_vars['diadiem']->value[0]['sTenDV'] : null;?>
" required="" class="form-control" name="tendonvi" placeholder="Tên địa điểm.."><br>
                            <label>Địa điểm</label>
                            <input type="text" id="diadiem" value="<?php echo $_smarty_tpl->tpl_vars['diadiem']->value ? $_smarty_tpl->tpl_vars['diadiem']->value[0]['sdiadiem'] : null;?>
" required="" class="form-control" name="diadiem" placeholder="Địa điểm..">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['diadiem']->value)) {
echo $_smarty_tpl->tpl_vars['diadiem']->value[0]['PK_iMaDV'];
}?>">
                        </div>
                        <button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
" class="btn btn-primary btn-flat"><?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
</button>
                        <?php if ($_smarty_tpl->tpl_vars['button_name']->value=='capnhatdiadiem') {?>
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách địa điểm</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên địa điểm</th>
                                <th class="text-center">Địa điểm</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             <?php if (!empty($_smarty_tpl->tpl_vars['danhsachdiadiem']->value)) {?>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['dd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dd']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danhsachdiadiem']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dd']->key => $_smarty_tpl->tpl_vars['dd']->value) {
$_smarty_tpl->tpl_vars['dd']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dd']->value['sTenDV'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dd']->value['sdiadiem'];?>
</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suadiadiem" value="<?php echo $_smarty_tpl->tpl_vars['dd']->value['PK_iMaDV'];?>
" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-flat btn-sm" name="xoadiadiem" value="<?php echo $_smarty_tpl->tpl_vars['dd']->value['PK_iMaDV'];?>
" title="Xóa" onclick="return confirm('Xóa địa điểm <?php echo $_smarty_tpl->tpl_vars['dd']->value['sTenDV'];?>
?');"><i class="fa fa-trash-o"></i></button> -->
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
