$(document).ready(function() {
	$(document).on('change','select[name=sl_donvi]',function(){
		// var x = $("select[name=sl_donvi]>option:selected").html();
		$("#iddiadiem").text($("select[name=sl_donvi]>option:selected").html());
		layhe();
	});
	$(document).on('change','input:radio[name=rd_he]:checked',function(){
		$("#idhe").text($("input:radio[name=rd_he]:checked").val());
		laymon();
	})
	$("input[name=sobienban]").keyup(function(){
		$("#r_sobienban").text('BIÊN BẢN SỐ: '+$("input[name=sobienban]").val());
	});
	$("input[name=time]").keyup(function(){
		$("#h").text($("input[name=time]").val());
	});
	$("input[name=ngay]").keyup(function(){
		$("#ngay").text($("input[name=ngay]").val());
	});
	$("input[name=thang]").keyup(function(){
		$("#thang").text($("input[name=thang]").val());
	});
	$("input[name=nam]").keyup(function(){
		$("#nam").text($("input[name=nam]").val());
	});
	$("input[name=bengiao]").keyup(function(){
        $("#idbengiao").text($("input[name=bengiao]").val());
    });
    $("input[name=bennhan]").keyup(function(){
        $("#idbennhan").text($("input[name=bennhan]").val());
    });
    //xóa tr 2 bảng và update lại số thự tự bảng bên phải

    $(document).on('click','button[name=del_tr]',function(){
    	//xóa tr ở 2 bảng
    	var tr = $(this).closest('tr');
    	var trClass = tr.attr('class');
    	
    	$(tr).remove();
    	$('.'+trClass).remove();
    	//update lại số tt và số túi đề
    	var s = $('#slde').html();
    	$('#slde').html(s-1);
    });
});
function layhe()
{
	var url = window.location.href;
	$.ajax({
		url: url,
		type: 'POST',
		data:{
			'action': 'getHe',
			'ID': $('select[name=sl_donvi]').val()
		},
		success: function(response){
			var rs = JSON.parse(response);
			var html ="";
			var html2 = "";
			var i=1;
			if(rs != "error")
			{
				html += '<label>Hệ đào tạo:</label>';
				$.each(rs,function(key,item){
					html += '<div class="radio radio-info" style="margin-top: 0;">';
					html += '<input type="radio" name="rd_he" id="radio'+i+'" value="'+item['sTenHe']+'">';
					html += '<label for="radio'+i+'"> '+item['sTenHe']+' </label>';
					html += '</div>';
					i++;
				});
				$('#div_he').removeAttr('hidden');
				$('#div_he').html(html);
				$('.tr_body').html(html2);
				$('.tr_body_right').html(html2);
				$('#ok').prop("type", "submit");
			}
			else{
				html = "";
				$('#div_he').html(html);
				$('.tr_body').html(html);
				$('.tr_body_right').html(html);
				$('#ok').prop("type", "button");
			}
		}
	});
}
function laymon()
{
	var url = window.location.href;
	$.ajax({
		url: url,
		type: 'POST',
		data:{
			'action': 'getMon',
			'He': $("input:radio[name=rd_he]:checked").val(),
			'DV': $('select[name=sl_donvi]').val()
		},
		success: function(data)
		{
			var rs = JSON.parse(data);
			var html = "";
			var html2 = "";
			var i =1;
			if(rs != 'error')
			{
				// alert(1);
				$.each(rs,function(key,item){
					html += '<tr class="tr_'+i+'">';
					html += '<td>'+item['sTenMon']+'</td>';
					if(item['sPhongThi']== null)
						html += '<td>Dự trữ</td>';
					else
						html += '<td>'+item['sPhongThi']+'</td>';
					html += '<td>'+item['sSoLuong']+'</td>';
					html += '<td>';
					html += '<button type="button" data-toggle="tooltip" title="Xóa dòng" class="btn btn-flat btn-xs btn-warning" name="del_tr" value="'+item['PK_sMaToChucThi']+'""><span class="glyphicon glyphicon-minus"></span></button>';
					html += '<input type="text" class="hide" name="hd_tct[]" value="'+item['PK_sMaToChucThi']+'" />';
					html += '</td>';
					html += '</tr>';
					//bảng bên xem trước
					html2 += '<tr class="tr_'+i+'">';
					html2 += '<td id="stt_td_'+i+'">'+i+'</td>';
					html2 += '<td>'+item['sTenMon']+'</td>';
					if(item['sPhongThi']== null)
						html2 += '<td>Dự trữ</td>';
					else
						html2 += '<td>'+item['sPhongThi']+'</td>';
					html2 += '<td style="text-align: right;">'+item['sSoLuong']+'</td>';
					html2 += '</tr>';
					i++;
				});
				// alert(i);
				$('#slde').html(i-1);
				$('.tr_body').html(html);
				$('.tr_body_right').html(html2);
			}
			else
			{
				html = "";
				$('.tr_body').html(html);
				$('.tr_body_right').html(html);
			}
		}
	});
}