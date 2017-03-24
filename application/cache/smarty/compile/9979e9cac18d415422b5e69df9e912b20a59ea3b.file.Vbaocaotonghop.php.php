<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-03-14 07:15:45
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\baocaothongke\Vbaocaotonghop.php" */ ?>
<?php /*%%SmartyHeaderCode:84422336858c798a1e0c4b0-59788201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9979e9cac18d415422b5e69df9e912b20a59ea3b' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\baocaothongke\\Vbaocaotonghop.php',
      1 => 1483003844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84422336858c798a1e0c4b0-59788201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'batdau' => 0,
    'ketthuc' => 0,
    'thongke' => 0,
    'i' => 0,
    'tk' => 0,
    'tong' => 0,
    'tong1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58c798a219e089_67035164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c798a219e089_67035164')) {function content_58c798a219e089_67035164($_smarty_tpl) {?><div class="content-wrapper">

  <section class="content-header">
    <h1>
      Báo cáo tổng hợp
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Trang chủ</li>
      <li class="active">Báo cáo tổng hợp</li>
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
                            <form action="" method="get" name="form-thongke" autocomplete="off">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="batdau">Thời gian bắt đầu</label>
                                        <input type="text" name="batdau" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['batdau']->value ? $_smarty_tpl->tpl_vars['batdau']->value : null;?>
" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                                        <label for="" id="batdau-error"></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label for="ketthuc">Thời gian kết thúc</label>
                                    <input type="text" name="ketthuc" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ketthuc']->value ? $_smarty_tpl->tpl_vars['ketthuc']->value : null;?>
" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                                    <label for="" id="ketthuc-error"></label>
                                </div>
                                <div class="col-sm-2">
                                    <br/>
                                    <button name="thongke" value="thongke" style="margin-top: 4px;" type="submit" class="btn btn-primary">Thống kê</button>
                                    <button class="btn btn-success glyphicon glyphicon-download-alt" name="in" value="in" ></button>
                                    <!-- <button name="in" value="in" style="margin-top: 4px;" class="btn btn-success glyphicon glyphicon-download-alt">In</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khoa</th>
                                        <th>Số môn</th>
                                        <th>Số lượng đề còn lại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['thongke']->value)) {
$_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars['tk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thongke']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tk']->key => $_smarty_tpl->tpl_vars['tk']->value) {
$_smarty_tpl->tpl_vars['tk']->_loop = true;
?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['tk']->value['sTenDonvi'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['tk']->value['tongmon'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['tk']->value['tong'];?>
</td>
                                                </tr>
                                            <?php } ?>
                                        <?php }?>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['thongke']->value)) {?>
                                        <tr>
                                            <td style="border-right: none;"></td>
                                            <td style="text-align: center;"><b style="font-size: 18px;">Tổng</b></td>
                                            <td>
                                                <b style="font-size: 18px;">
                                                
                                                    <?php $_smarty_tpl->tpl_vars['tong'] = new Smarty_variable(0, null, 0);?>
                                                    <?php  $_smarty_tpl->tpl_vars['tk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thongke']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tk']->key => $_smarty_tpl->tpl_vars['tk']->value) {
$_smarty_tpl->tpl_vars['tk']->_loop = true;
?>
                                                        <?php $_smarty_tpl->tpl_vars['tong'] = new Smarty_variable($_smarty_tpl->tpl_vars['tong']->value+$_smarty_tpl->tpl_vars['tk']->value['tongmon'], null, 0);?>
                                                    <?php } ?>
                                                    <?php echo $_smarty_tpl->tpl_vars['tong']->value;?>

                                                
                                                </b>
                                            </td>
                                            <td>
                                                <b style="font-size: 18px;">
                                                    <?php $_smarty_tpl->tpl_vars['tong1'] = new Smarty_variable(0, null, 0);?>
                                                    <?php  $_smarty_tpl->tpl_vars['tk'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tk']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thongke']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tk']->key => $_smarty_tpl->tpl_vars['tk']->value) {
$_smarty_tpl->tpl_vars['tk']->_loop = true;
?>
                                                        <?php $_smarty_tpl->tpl_vars['tong1'] = new Smarty_variable($_smarty_tpl->tpl_vars['tong1']->value+$_smarty_tpl->tpl_vars['tk']->value['tong'], null, 0);?>
                                                    <?php } ?>
                                                    <?php echo $_smarty_tpl->tpl_vars['tong1']->value;?>

                                                </b>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tr>
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
<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $("form[name=form-thongke]").validate({

            // Specify the validation rules
            rules: {
                batdau: "required",
                ketthuc:"required"
            },
            // Specify the validation error messages
            messages: {
                batdau: "Ngày bắt đầu không được để trống",
                ketthuc:"Ngày kết thúc không được để trống"
            },
        });
        $(document).on('click','button[name=thongke]',function(){
            var batdau  =$('input[name=batdau]').val();
            var ketthuc =$('input[name=ketthuc]').val();
            if(parseInt(ketthuc.search('y'))>1)
            {
                $('#ketthuc-error').html('Thời gian bắt đầu chưa đúng định dạng');
                $('#ketthuc-error').prop('style','display: block;')
                return false;
            }
            if(parseInt(batdau.search('y'))>1)
            {
                $('#batdau-error').html('Thời gian kết thúc chưa đúng định dạng');
                $('#batdau-error').prop('style','display: block;')
                return false;
            }
        });
    });
<?php echo '</script'; ?>
>


<?php }} ?>
