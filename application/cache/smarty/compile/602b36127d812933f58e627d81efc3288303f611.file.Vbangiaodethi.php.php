<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-01-04 03:57:30
         compiled from "C:\zpanel\hostdata\dbcl\public_html\dethi\application\views\bienban\Vbangiaodethi.php" */ ?>
<?php /*%%SmartyHeaderCode:718101145586c72aa8be363-65030462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '602b36127d812933f58e627d81efc3288303f611' => 
    array (
      0 => 'C:\\zpanel\\hostdata\\dbcl\\public_html\\dethi\\application\\views\\bienban\\Vbangiaodethi.php',
      1 => 1483022306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '718101145586c72aa8be363-65030462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'title' => 0,
    'donvi' => 0,
    'dv' => 0,
    'bt_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_586c72aa95bc18_81251570',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586c72aa95bc18_81251570')) {function content_586c72aa95bc18_81251570($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
assets/js/bangiaode.js"><?php echo '</script'; ?>
>

<style type="text/css">
#container{
		font-family: 'Times New Roman';
        width:645px;
        margin:0px auto;
        /*padding:10px;*/
        /*border : 1px solid ;*/
        /*min-height: 780px;*/
        margin-bottom: 20px;
        }
        .left-header{
        float:left;
        width:40%;
        text-align:center;
        margin-top: 20px;
    }
    .right-header{
        float:right;
        text-align:center;
        padding:0 20px 0 0;
        margin-top: 20px;
    }
    .c-left{
        margin-left: 65px;
    }
    
  .right-footer{
        float:right;
        width:110mm;
        text-align:center;
        margin-top: 28px;
    }
    .right-footerbottom{
        margin-top: 70px;
        float:right;
        width:110mm;
        text-align:center;
    }
    
    .chemical {
        margin-left: -580px;
        margin-top: 15px;
    
    }
    .table{
    	margin-left: 0;
    }
    table {
        margin :0px 0px 0px 40px;
    }
    td{
        padding:3px;
        border-bottom:1px dotted ;
        border-top:none;

    }
    th{
        padding-left:3px;
        border-bottom: 1px solid ;
    }

.rfooter {
        margin-left: -289px;
         margin-top: -13px;
        }
 .r1footer {
    margin-left: 299px;
    margin-top: 52px;
    float: left;
    
 }
 .noidung
 {
    margin-left: 50px;
    font-size: 17px;
 }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

        </h1>
        <ol class="breadcrumb">
          <li><a href="welcome.html"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        </ol>
    </section>
    <section class="content">
	    <div class="row">
	    	<div class="col-md-5">
		    	<div class="box">
		    		<div class="box-body">
		    			<div class="row">
		    				<div class="col-md-12">
		    					<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
		    						<div class="form-group">
		    							<label>Số biên bản:</label>
		    							<input type="text" name="sobienban" value="" class="form-control">
		    						</div>
		    						<div class="form-group">
		    							<label>Thời gian:</label><br /	>
		    							<input type="text" name="time" placeholder="hh:mm" style="width: 50px;">,  Ngày <input type="text" name="ngay" placeholder="DD" style="width: 38px;"> tháng <input type="text" placeholder="MM" name="thang" style="width: 38px;"> năm <input type="text" placeholder="YYYY" name="nam" style="width: 38px;">
		    							<!-- <input type="text" placeholder="dd/mm/yyyy hh:mm" name="time" class="form-control" value=""> -->
		    						</div>
		    						
		    						<!-- <div class="form-group">
		    							<label>Đơn vị quản lý: </label>
		    							<input type="text" name="diadiem" value="" class="form-control">
		    						</div> -->
		    						<div class="form-group">
		    							<label>Bên giao:</label>
		    							<input type="text" name="bengiao" value="" class="form-control">
		    						</div>
		    						<div class="form-group">
		    							<label>Bên nhận:</label>
		    							<input type="text" name="bennhan" value="" class="form-control">
		    						</div>
		    						<div class="form-group">
		    							<label>Đơn vị quản lý:</label>
		    							<select class="form-control select2" name="sl_donvi" required="">
		    								<option>--Chọn đơn vị--</option>
			    							<?php  $_smarty_tpl->tpl_vars['dv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dv']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['donvi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dv']->key => $_smarty_tpl->tpl_vars['dv']->value) {
$_smarty_tpl->tpl_vars['dv']->_loop = true;
?>
			    								<option value="<?php echo $_smarty_tpl->tpl_vars['dv']->value['PK_iMaDonvi'];?>
"><?php echo $_smarty_tpl->tpl_vars['dv']->value['sTenDonvi'];?>
</option>
			    							<?php } ?>
		    							</select>
		    						</div>
		    						<div class="form-group" hidden="" id="div_he">
		    						</div>
		    						<div class="form-group">
		    							<label>DS gói đề:</label>
			    						<table class="table table-hover table-bordered" style="margin-left: 0; margin-bottom: 5px;">
			    							<thead>
			    								<tr>
			    									<td style="text-align: center; width:50%">Môn thi</td style="text-align: center;">
			    									<td style="text-align: center; width: 20%;">Phòng thi</td>
			    									<td style="text-align: center; width: 20%;">Số lượng</td>
			    									<td style="text-align: center; width: 10%;"></td>
			    								</tr>
			    							</thead>
			    							<tbody class="tr_body">
			    								
			    							</tbody>
			    						</table>
		    						</div>
		    						
		    						<div class="form-group">
		    							<button type="<?php echo $_smarty_tpl->tpl_vars['bt_type']->value;?>
" id="ok" name="ok" value="ok" class="btn btn-flat btn-primary"><span class="glyphicon glyphicon-download-alt"></span> Lưu & Tải xuống</button>
		    							<input type="text" hidden="" name="hd_bb">
		    							<!-- <button type="submit" id="luu" name="luu" value="luu" class="btn btn-flat btn-success"><span class="glyphicon glyphicon-print"></span> In biên bản</button> -->
		    						</div>
		    					</form>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		    <div class="col-md-7">
		    	<div class="box">
		    		<div class="box-body">
		    			<div class="row">
		    				<div id="container">
								<div class="header">
								        <div class="left-header" style="line-height: 20px; font-size: 17px;">
								            <span>VIỆN ĐẠI HỌC MỞ HÀ NỘI<br />HỘI ĐỒNG TN<br /><b>BAN ĐỀ THI</b><b> 
								            <p style="text-transform: uppercase;font-size: 14px" class="cangiua" id="r_sobienban"></p>
								            </b></span><hr style="width: 90px; border:1px solid black" />
								        </div>
								        <div class="right-header" style="font-size: 17px;">
								            <span style="font-weight: bold; line-height: 20px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br /><b > <p style="text-transform: uppercase;" class="cangiua"> Độc lập - Tự do - Hạnh phúc</p></b></span><hr style="width: 170px; border:1px solid black"/>
								        </div>
								         <div style="clear:both"></div>
								      <div style="text-align:center ;margin-top: 45px;">
								        <span style="font-size:20px; font-weight:bold ;">BIÊN BẢN GIAO NHẬN ĐỀ</span><br />
								      </div>
								    </div>
								    <div style="clear:both"></div>
								    <div style="text-align:center ;margin-top: 10px;">
								        <span style="font-size:20px; font-weight:bold ;"></span><br />
								    </div>
								     
								     <div class="page-wrapper">
								            <div class="noidung">Vào hồi <label style="font-weight: none" id="h">…</label>, ngày <label id="ngay">…</label> tháng <label id="thang">…</label> năm <label id="nam">…</label></div>
								            <div class="noidung">Tại Phòng Khảo thí và Đảm bảo chất lượng, Chúng tôi gồm:</div>
								            <div style="font-size: 17px;margin-left: 50px;">Bên giao: <b id="idbengiao"></b></div>
								            <div style="font-size: 17px;margin-left: 50px;">Bên Nhận: <b id="idbennhan"></b></div>
								            <div style="font-size: 17px;margin-left: 50px;">Tổ chức bàn giao đề thi tốt nghiệp hệ <b id="idhe">……</b> tại khoa <b id="iddiadiem"></b></div>
								            <div style="font-size: 17px;margin-left: 50px;">Số lượng: <label id="slde">……</label> túi đề các môn thi cụ thể như sau:</div>
								            <!-- kẻ bảng -->
								            
								            <div class="noidung">
								                    <table style="width: 85%; margin-bottom: 3%;margin-top: 3%" BORDER = 1 id="righttable">
								                    <thead>
								                        <tr>
								                            <th class="cot1" style="text-align: center; width:8%">STT</th>
								                            <th class="cot2" style="text-align: center; width:52%"">Môn thi</th> 
								                            <th class="cot3" style="text-align: center; width:20%"">Phòng thi</th>
								                            <th class="cot4" style="text-align: center; width:20%"">Số lượng</th>
								                        </tr>
								                    </thead>
									                    <tbody class="tr_body_right">
									                    	
									                    </tbody>
								                    </table>
								            </div>
								            <div style="font-size: 17px;margin-left: 50px;">+ Tình trạng bàn giao: Đề thi được đựng trong túi đựng đề thi và được đóng dấu niêm phong.</div>
								            <div style="font-size: 17px;margin-left: 50px;">+  Đề thi đã đủ số lượng so với yêu cầu đặt đề thi của Ban Thư ký tại địa điểm thi.</div>
								 
								        </div>
								        <div style="padding-top:0px; text-align: center; font-size: 20px;"  class="page-wrapper">
								            <div class="footer" >
								                <div class="left-footer" style="float: left; margin-left: 100px; margin-top:26px; ">
								                    <span><strong>NGƯỜI NHẬN</strong></span>
								                </div>
								                <div class="right-footer" style="float: right; margin-right: 8%; width: 20%;">
								                    <span><strong>NGƯỜI GIAO</strong></span>
								                </div>
								            </div>
								        </div>
								</div>
		    			</div>
		    		</div>
		    	</div>
		    </div>
	    </div>
    </section>
</div>

<?php echo '<script'; ?>
>
var x = Math.floor((Math.random() * 999999) + 100000);
$('input[name=hd_bb]').val('BG'+x);
$('input[name=time]').inputmask({
	mask: "h:s",
    // placeholder: "hh:mm",
    alias: "time",
    hourFormat: "24"
});
$('input[name=ngay]').inputmask({
	mask: "d",
    // placeholder: "DD",
    alias: "day",
    // hourFormat: "24"
});
$('input[name=thang]').inputmask({
	mask: "m",
    // placeholder: "MM",
    alias: "month",
    // hourFormat: "24"
});
$('input[name=nam]').inputmask({
	mask: "y",
    // placeholder: "YYYY",
    alias: "year",
    // hourFormat: "24"
});
<?php echo '</script'; ?>
><?php }} ?>
