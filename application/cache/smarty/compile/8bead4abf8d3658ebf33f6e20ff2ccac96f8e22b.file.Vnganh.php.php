<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 07:03:48
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\danhmuc\Vnganh.php" */ ?>
<?php /*%%SmartyHeaderCode:1723830004586c9e54a65322-78775403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bead4abf8d3658ebf33f6e20ff2ccac96f8e22b' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\danhmuc\\Vnganh.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1723830004586c9e54a65322-78775403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listEdit' => 0,
    'button_name' => 0,
    'button_value' => 0,
    'danhsachnganh' => 0,
    'i' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c9e54ddceb9_77645702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c9e54ddceb9_77645702')) {function content_586c9e54ddceb9_77645702($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
      Danh mục ngành học
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh mục ngành học </li>
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
                            <label>Tên ngành</label>
                            <input type="text" id="tennganh" value="<?php if (!empty($_smarty_tpl->tpl_vars['listEdit']->value)) {
echo $_smarty_tpl->tpl_vars['listEdit']->value[0]['sTenNganh'];
}?>" class="form-control" name="tennganh" required="" placeholder="Tên ngành..">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['listEdit']->value)) {
echo $_smarty_tpl->tpl_vars['listEdit']->value[0]['PK_iMaNganh'];
}?>">
                        </div>
                        <button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
" class="btn btn-primary btn-flat"><?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
</button>
                        <?php if ($_smarty_tpl->tpl_vars['button_name']->value=='capnhatnganh') {?>
                            <button type="submit" name="huy" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</button>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách ngành</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên ngành</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             <?php if (!empty($_smarty_tpl->tpl_vars['danhsachnganh']->value)) {?>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['dt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danhsachnganh']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dt']->key => $_smarty_tpl->tpl_vars['dt']->value) {
$_smarty_tpl->tpl_vars['dt']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['dt']->value['sTenNganh'];?>
</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suanganh" value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['PK_iMaNganh'];?>
" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoanganh" value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['PK_iMaNganh'];?>
" title="Xóa" onclick="return confirm('Xóa ngành <?php echo $_smarty_tpl->tpl_vars['dt']->value['sTenNganh'];?>
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
