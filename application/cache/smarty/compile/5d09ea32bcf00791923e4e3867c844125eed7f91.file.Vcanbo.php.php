<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 07:03:54
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\canbo\Vcanbo.php" */ ?>
<?php /*%%SmartyHeaderCode:1919862482586c9e5aba34a4-71525081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d09ea32bcf00791923e4e3867c844125eed7f91' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\canbo\\Vcanbo.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1919862482586c9e5aba34a4-71525081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'danhsachcb' => 0,
    'i' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c9e5ac526d5_83396313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c9e5ac526d5_83396313')) {function content_586c9e5ac526d5_83396313($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
        Cán bộ
    </h1>
    <ol class="breadcrumb">
      <li><a href="welcome.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
      <li class="active">Danh sách cán bộ</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

<!-- Thông báo-->

<!-- Thông báo-->
        <!-- danh sách cán bộ -->
        
        <hr /><div class="tab-content">
            <div class="col-md-12">
                <div class="box box-success" style="border-top-color: #666;">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px;">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
themcanbo" class="btn btn-primary btn-flat btm-sm"><span class="glyphicon glyphicon-plus"></span> Thêm cán bộ</a>
                            </div>
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <table id="example1" class="table example table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Tài khoản</th>
                                                <th class="text-center">Họ tên</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Số điện thoại</th>
                                                <th class="text-center">Tác vụ</th>
                                            </tr>
                                        </thead>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['danhsachcb']->value)) {?>
                                        <tbody>
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danhsachcb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                                            <tr>
                                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['list']->value['sTaiKhoan'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['list']->value['sTenCB'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['list']->value['sEmail'];?>
</td>
                                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['list']->value['sNgaySinh'];?>
</td>
                                                <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['list']->value['sGioiTinh'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['list']->value['sSDT'];?>
</td>
                                                <td class="text-center">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
themcanbo?id=<?php echo $_smarty_tpl->tpl_vars['list']->value['PK_sMaCB'];?>
" type="submit" class="btn btn-xs btn-success btm-sm" title="Sửa"><i class="fa fa-edit"></i></a>
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
                </div>
            </div>
        </div>
    </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper --><?php }} ?>
