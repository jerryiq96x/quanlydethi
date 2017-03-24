<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 07:03:58
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\canbo\Vthemcanbo.php" */ ?>
<?php /*%%SmartyHeaderCode:780473332586c9e5e6abdb4-47445005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e3bca59411cbc49cb1fa0066f93544bfcc16e14' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\canbo\\Vthemcanbo.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '780473332586c9e5e6abdb4-47445005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'canbo' => 0,
    'dsquyen' => 0,
    'i' => 0,
    'q' => 0,
    'linkanh' => 0,
    'button_name' => 0,
    'button_value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c9e5e8254c2_81321078',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c9e5e8254c2_81321078')) {function content_586c9e5e8254c2_81321078($_smarty_tpl) {?><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/themcanbo.js"><?php echo '</script'; ?>
>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cán bộ
        </h1>
        <ol class="breadcrumb">
          <li><a href="welcome.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
                <div class="tab-content">
                    <div class="col-md-12">
                        <div class="box box-success" style="border-top-color: #666;">
                            <div class="box-body">
                                <form action="" method="post" id="form_register" autocomplete="off" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên đăng nhập:</label>
                                            <input type="text" name="taikhoan" required="" id="taikhoan" <?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value[0]['sTaiKhoan'])) {?> readonly="readonly"<?php }?> value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['sTaiKhoan'];
}?>" class="form-control" placeholder="Tên đăng nhập"/>
                                            <span id="error" style="color:red; font-weight: bold;"></span>
                                            <input type="hidden" name="hidden_id" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['PK_sMaCB'];
}?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu:</label>
                                            <input type="password" required="" <?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value[0]['sMatKhau'])) {?> readonly="readonly"<?php }?> name="matkhau" id="matkhaumoi" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {?>******<?php }?>" class="form-control"  placeholder="Mật khẩu"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu:</label>
                                            <input type="password" required="" <?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value[0]['sMatKhau'])) {?> readonly="readonly"<?php }?> name="nhaplaimk" id="nhaplaimk" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {?>******<?php }?>" class="form-control"  placeholder="Nhập lại mật khẩu"/>
                                            <span id="error_mk" style="color:red; font-weight: bold;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Phân quyền:</label><br />
                                            <div class="radio radio-info radio-inline col-md-12">
                                            <div class="col-md-3"></div>
                                            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['q']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dsquyen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value) {
$_smarty_tpl->tpl_vars['q']->_loop = true;
?>
                                                <div class="col-md-4">
                                                    <input type="radio" id="phanquyen<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['q']->value['PK_iMaQuyen'];?>
"<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)&&$_smarty_tpl->tpl_vars['canbo']->value[0]['FK_iMaQuyen']==$_smarty_tpl->tpl_vars['q']->value['PK_iMaQuyen']) {?>checked<?php }?> name="phanquyen">
                                                    <label for="phanquyen<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['q']->value['sTenQuyen'];?>
</label>
                                                </div>
                                                <!--<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
-->
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label id="chontep">Ảnh đại diện:</label><br />
                                            <?php if (empty($_smarty_tpl->tpl_vars['linkanh']->value)) {?>
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/avatar04.png" width="40%" id="image" name="image" />
                                            <?php } else { ?>
                                            <img src="<?php if (duongdananh($_smarty_tpl->tpl_vars['canbo']->value[0]['PK_sMaCB'])=='dung') {
echo $_smarty_tpl->tpl_vars['linkanh']->value;?>
.jpg<?php } else {
echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/img/avatar04.png<?php }?>" width="40%" id="image" name="image" />
                                            <?php }?>
                                            <input  type="file" class="hide" id="fileimage" onchange="readURL(this);" value="" name="fileimage" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên cán bộ:</label>
                                            <input type="text" required="" name="tencanbo" id="tencanbo" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['sTenCB'];
}?>" class="form-control" placeholder="Ho và tên"/>
                                        </div>
                                        <div >
                                            <label>Giới tính:</label>
                                            <div class="radio radio-info">
                                                <input type="radio" <?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)&&$_smarty_tpl->tpl_vars['canbo']->value[0]['sGioiTinh']=="Nam") {?>checked<?php }?> name="gioitinh" id="radio1" value="option1">
                                                <label for="radio1">
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" <?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)&&$_smarty_tpl->tpl_vars['canbo']->value[0]['sGioiTinh']=="Nữ") {?>checked<?php }?> name="gioitinh" id="radio2" value="option2">
                                                <label for="radio2">
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="email" id="email" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['sEmail'];
}?>" class="form-control" placeholder="Email@gmail"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày sinh:</label>
                                            <input type="text" name="ngaysinh" id="ngaysinh" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['sNgaySinh'];
}?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy" />
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <input type="text" name="phone" id="phone" value="<?php if (!empty($_smarty_tpl->tpl_vars['canbo']->value)) {
echo $_smarty_tpl->tpl_vars['canbo']->value[0]['sSDT'];
}?>" class="form-control"  data-inputmask="'alias': '00000-9999'" placeholder="+84.."/>
                                        </div>
                                        <button type="submit" name="<?php echo $_smarty_tpl->tpl_vars['button_name']->value;?>
" id="xacnhan"  value="<?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
" class="btn btn-primary btn-flat"><?php echo $_smarty_tpl->tpl_vars['button_value']->value;?>
</button>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
canbo" class="btn btn-flat btn-primary btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php echo '<script'; ?>
 type="text/javascript">
$(document).ready(function()
{
    $('#form_register').submit(function(){
        var mk1 = $('#matkhaumoi').val();
        var mk2 = $('#nhaplaimk').val();
        var flag = true;
        if(mk1 != mk2)
        {
            $('#error_mk').html('Mật khẩu nhập lại không đúng!');
            flag = false;
        }
        else
        {
            var html ="";
            $('#error_mk').html(html);
            flag = true;
        }
        return flag;
    });
});
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function() {
        $(document).on('click','#image',function(){
            $('#fileimage').click();
        });
    });
    // cho ảnh mới chèn lên ảnh cũ
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
    }
<?php echo '</script'; ?>
>

<?php }} ?>
