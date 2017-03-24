<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-05 09:45:09
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\danhmuc\Vkhoa.php" */ ?>
<?php /*%%SmartyHeaderCode:985721460586c9e5881a737-88005472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '780bff12bcda8cafcf191ee9737a1ec1332ad440' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\danhmuc\\Vkhoa.php',
      1 => 1483609508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '985721460586c9e5881a737-88005472',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c9e588f39b4_74180087',
  'variables' => 
  array (
    'title' => 0,
    'khoa' => 0,
    'idsua' => 0,
    'button_name' => 0,
    'button_value' => 0,
    'url' => 0,
    'listEdit' => 0,
    'i' => 0,
    'l' => 0,
    'dt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c9e588f39b4_74180087')) {function content_586c9e588f39b4_74180087($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
      <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 </li>
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
                            <label>Tên Đơn vị</label>
                            <input type="text" id="tendonvi" value="<?php echo !empty($_smarty_tpl->tpl_vars['khoa']->value) ? $_smarty_tpl->tpl_vars['khoa']->value[0]['sTenDonvi'] : null;?>
" required="" class="form-control" name="tendonvi" placeholder="Tên khoa...">
                           <!--  <label>Mật khẩu</label> -->
                            <input type="hidden" name="hidden_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['idsua']->value)) {
echo $_smarty_tpl->tpl_vars['idsua']->value;
}?>">
                        </div>
                        <button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
" class="btn btn-primary btn-flat"><?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
</button>
                        <?php if ($_smarty_tpl->tpl_vars['button_name']->value=='capnhatkhoa') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
khoa" value="huycapnhat" class="btn btn-flat btn-danger"><span class="glyphicon glyphicon-remove"></span> Hủy</a>
                        <?php }?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success" style="border-top-color: #666;">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách khoa thi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post">
                        <table class="example table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên khoa</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                             <?php if (!empty($_smarty_tpl->tpl_vars['listEdit']->value)) {?>
                            <tbody>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listEdit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
                                    <tr>
                                        <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['l']->value['sTenDonvi'];?>
</td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-xs" name="suakhoa" value="<?php echo $_smarty_tpl->tpl_vars['l']->value['PK_iMaDonvi'];?>
" title="Sửa"><i class="fa fa-edit"></i></button>
                                            <!-- <button type="submit" class="btn btn-danger btn-xs" name="xoamon" value="<?php echo $_smarty_tpl->tpl_vars['dt']->value['PK_iMaMon'];?>
" title="Xóa" onclick="return confirm('Xóa môn <?php echo $_smarty_tpl->tpl_vars['dt']->value['stendonvi'];?>
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
