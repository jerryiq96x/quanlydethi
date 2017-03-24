<script src="{$url}assets/js/themcanbo.js"></script>
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
                                            <input type="text" name="taikhoan" required="" id="taikhoan" {if !empty($canbo[0]['sTaiKhoan'])} readonly="readonly"{/if} value="{if !empty($canbo)}{$canbo[0]['sTaiKhoan']}{/if}" class="form-control" placeholder="Tên đăng nhập"/>
                                            <span id="error" style="color:red; font-weight: bold;"></span>
                                            <input type="hidden" name="hidden_id" value="{if !empty($canbo)}{$canbo[0]['PK_sMaCB']}{/if}">
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu:</label>
                                            <input type="password" required="" {if !empty($canbo[0]['sMatKhau'])} readonly="readonly"{/if} name="matkhau" id="matkhaumoi" value="{if !empty($canbo)}******{/if}" class="form-control"  placeholder="Mật khẩu"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu:</label>
                                            <input type="password" required="" {if !empty($canbo[0]['sMatKhau'])} readonly="readonly"{/if} name="nhaplaimk" id="nhaplaimk" value="{if !empty($canbo)}******{/if}" class="form-control"  placeholder="Nhập lại mật khẩu"/>
                                            <span id="error_mk" style="color:red; font-weight: bold;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Phân quyền:</label><br />
                                            <div class="radio radio-info radio-inline col-md-12">
                                            <div class="col-md-3"></div>
                                            {$i=1}
                                            {foreach $dsquyen as $q}
                                                <div class="col-md-4">
                                                    <input type="radio" id="phanquyen{$i}" value="{$q.PK_iMaQuyen}"{if !empty($canbo) && $canbo[0]['FK_iMaQuyen'] == $q.PK_iMaQuyen}checked{/if} name="phanquyen">
                                                    <label for="phanquyen{$i}">{$q.sTenQuyen}</label>
                                                </div>
                                                <!--{$i++}-->
                                            {/foreach}
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <label id="chontep">Ảnh đại diện:</label><br />
                                            {if empty($linkanh)}
                                            <img src="{$url}assets/img/avatar04.png" width="40%" id="image" name="image" />
                                            {else}
                                            <img src="{if duongdananh($canbo[0]['PK_sMaCB'])=='dung'}{$linkanh}.jpg{else}{$url}assets/img/avatar04.png{/if}" width="40%" id="image" name="image" />
                                            {/if}
                                            <input  type="file" class="hide" id="fileimage" onchange="readURL(this);" value="" name="fileimage" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên cán bộ:</label>
                                            <input type="text" required="" name="tencanbo" id="tencanbo" value="{if !empty($canbo)}{$canbo[0]['sTenCB']}{/if}" class="form-control" placeholder="Ho và tên"/>
                                        </div>
                                        <div >
                                            <label>Giới tính:</label>
                                            <div class="radio radio-info">
                                                <input type="radio" {if !empty($canbo) && $canbo[0]['sGioiTinh'] == "Nam"}checked{/if} name="gioitinh" id="radio1" value="option1">
                                                <label for="radio1">
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" {if !empty($canbo) && $canbo[0]['sGioiTinh'] == "Nữ"}checked{/if} name="gioitinh" id="radio2" value="option2">
                                                <label for="radio2">
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" name="email" id="email" value="{if !empty($canbo)}{$canbo[0]['sEmail']}{/if}" class="form-control" placeholder="Email@gmail"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày sinh:</label>
                                            <input type="text" name="ngaysinh" id="ngaysinh" value="{if !empty($canbo)}{$canbo[0]['sNgaySinh']}{/if}" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy" />
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại:</label>
                                            <input type="text" name="phone" id="phone" value="{if !empty($canbo)}{$canbo[0]['sSDT']}{/if}" class="form-control"  data-inputmask="'alias': '00000-9999'" placeholder="+84.."/>
                                        </div>
                                        <button type="submit" name="{$button_name}" id="xacnhan"  value="{$button_value}" class="btn btn-primary btn-flat">{$button_value}</button>
                                        <a href="{$url}canbo" class="btn btn-flat btn-primary btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Quay lại</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
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
</script>

<script type="text/javascript">
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
</script>

