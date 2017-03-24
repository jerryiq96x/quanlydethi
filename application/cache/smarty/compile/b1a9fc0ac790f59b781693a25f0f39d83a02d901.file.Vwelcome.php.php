<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 03:47:47
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\Vwelcome.php" */ ?>
<?php /*%%SmartyHeaderCode:1405136343586c7063a30b55-06456204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1a9fc0ac790f59b781693a25f0f39d83a02d901' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\Vwelcome.php',
      1 => 1483003842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1405136343586c7063a30b55-06456204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dethi' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c7063aa28c6_03421257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c7063aa28c6_03421257')) {function content_586c7063aa28c6_03421257($_smarty_tpl) {?><div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box" style="background-color: #3c8dbc; min-height:21.5em; border:1.1em solid #FFF;">
            <div class="box-body">
            <center style="color:#FFF;">
            	<h2 style="font-weight:bold;">HỆ THỐNG QUẢN LÝ ĐỀ THI - VIỆN ĐẠI HỌC MỞ HÀ NỘI</h2>
            	<div style="font-size:5.2em;"><i class="fa fa-file-text"></i></div>
            	<h3>Cán bộ: <?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenCB'];?>
</h3>
            	<h3>Chức vụ: <?php echo $_smarty_tpl->tpl_vars['dethi']->value['sTenQuyen'];?>
</h3>
            </center>
            </div>
        </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div><?php }} ?>
