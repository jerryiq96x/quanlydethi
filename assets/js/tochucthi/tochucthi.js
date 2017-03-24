$(document).ready(function() {
    $('button[name=info]').click(function() {
        var x = $(this).val();
        getInfo(x);
    })
    $("form[name=formtochucthi]").validate({
    
        // Specify the validation rules
        rules: {
            thoigianthi: "required",
            sodeboc:{
                required:true,
                regex : /^[0-9]+$/
            },
            diadiemthi:'required',
            monchuongtrinhdaotao:'required'

        },
        // Specify the validation error messages
        messages: {
            thoigianthi: "Thời gian thi không được để trống!",
            sodeboc:{
                required:'Số đề bốc không được để trống!',
                regex :"Số đề không phải là số"
            },
            diadiemthi:"Địa điểm thi không được để trống!",
            monchuongtrinhdaotao:"Môn chương trình đào tạo không được để trống!"
        },
    });

    //
    $('.inputmast').inputmask({
        mask: "1/2/y h:s",
        placeholder: "dd/mm/yyyy hh:mm",
        alias: "datetime",
        hourFormat: "24"
        });
        var url=window.location.href;
        $(document).on('change','select[name=monchuongtrinhdaotao]',function(){
            var mamondaotao= $('select[name=monchuongtrinhdaotao]').val();
            $.ajax({
                url:url,
                type:'post',
                data:{
                    action:'densode',
                    mamondaotao:mamondaotao
                },
                success: function(response) {
                    var result = JSON.parse(response);
                    if(result>0)
                    {
                        $('#txttong').html('Tổng số:')
                        $('#tongso').html(result);
                    }
                    else{
                        $('#txttong').html('')
                        $('#tongso').html('');
                    }
                }
            });
        });
        $(document).on('click','button[name=luutochucthi]',function(){
            var thoigianthi=$('input[name=thoigianthi]').val();
            if(thoigianthi=='' || parseInt(thoigianthi.search('m'))>1)
            {
                $('#thoigianthi-error').html('Thời gian thi chưa đúng');
                $('#thoigianthi-error').prop('style','display: block;')
                return false;
            }
        });
        $(document).on('click','button[name=bocde]',function(){

            var mamondaotao= $('select[name=monchuongtrinhdaotao]').val();
            var tongso=parseInt($('#tongso').html());
            var sodeboc= $('input[name=sodeboc]').val();

            if(sodeboc>tongso)
            {
                showMessage('Số đề bạn bốc vượt quá tổng số đề trong kho, kiểm tra lại.','danger');
                return false;
            }
            else if(sodeboc.length==0 || parseInt(sodeboc)==0)
            {
                return false;
            }
            else{
                $.ajax({
                    url:url,
                    type:'post',
                    data:{
                        action:'bocde',
                        mamondaotao:mamondaotao,
                        sodeboc:sodeboc
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        var html='';
                        var j=1;
                            for(var i=0;i<result.length;i++)
                            {   

                                html+='<tr>';
                                    html+='<td class="text-center" style="vertical-align:middle">';
                                    html+=j++;
                                    html+='</td>';
                                    html+='<td>';
                                        html+='<input name="made[]" class="form-control" value="'+result[i]['PK_sMaDT']+'" readonly>';
                                    html+="</td>";
                                    
                                    html += '<td>';
                                        html += '<input name="phongthi[]" class="form-control">';
                                    html += '</td>';
                                    
                                    html+='<td>';
                                        html+='<input name="soluongde[]" class="form-control">';
                                    html+='</td>';
                                html+='</tr>';
                            }
                            $('.ketqua>tbody').html(html);
                            $('button').removeClass('hide');
                            $('button[name=luutochucthi]').prop("type","submit");
                            $('#ghichu').removeClass('hide');
                            $('table').removeClass('hide');
                    }
                });
            }
        });
});
function getInfo(x)
{
    var url = window.location.href;
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'action' : 'getInfo',
            'ID' : x
        },
        success: function(data){
            var rs = JSON.parse(data);
            var link = 'http://localhost:8080/quanlydethi/';
            if(rs != 'error')
            {
                var html = "";
                var i = 1;
                $.each(rs,function(key,item){
                    html += '<tr>';
                    html += '<td class="text-center">'+i+'</td>';
                    html += '<td>'+item['FK_sMaDT']+'</td>';
                    html += '<td>'+item['sTenHe']+' - '+item['sTenNganh']+' - '+item['iNam']+' - '+item['sTenMon']+'</td>';
                    html += '<td>'+item['sThoiGianThi']+'</td>';
                    html += '<td>'+item['sPhongThi']+'</td>';
                    html += '<td>'+item['sSoLuong']+'</td>';
                    html += '<td>'+item['sTenCB']+'</td>';
                    html += '<td class="text-center">';
                    html += '<a href="'+link+'file/'+item['sUpLoadDe']+'"class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="Đề thi"><i class="fa fa-download"></i></a>';
                    if(item['sUpLoadDA'] != 0)
                    {
                        html += '<a href="'+link+'file/'+item['sUpLoadDA']+'"class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Đáp án"><i class="fa fa-download"></i></a>';
                    }
                    html += '</td>';
                    html += '</tr>';
                });

                $('#body_dsde').html(html);
            }
            else{
                $('#body_dsde').html('Không có dữ liệu');
            }
        }
    });
}