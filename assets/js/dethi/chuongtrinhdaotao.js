$(document).ready(function() {
	var url = window.location.href;
	$(document).on('submit','#chuongtrinhdaotaosubmit',function(e){
		var donvi =$('select[name=donvi]').val();
		var nganh =$('select[name=nganh]').val();
		var he    =$('select[name=he]').val();
		var nam   =$('select[name=nam]').val();
		var ma    =$('input[name=ma]').val();
		$.ajax({
			url:url,
			type:'post',
			async: false,
			data:{
				action:'kiemtrachuongtrinhdaotao',
				donvi:donvi,
				nganh:nganh,
				he:he,
				nam:nam,
				ma:ma
			},
			success:function(response){
				result=JSON.parse(response);
				if(result>0)
				{
					showMessage("Chương trình đào tạo này đã tồn tại",'danger');
					e.preventDefault();
				}
			}
		});
	});
	$(document).on('click','button[name=sua]',function(){//đổ dữ liệu vào input
		var ma=$(this).val();
		$('input[name=ma]').val(ma);
		$('button[name=chuongtrinhdaotao]').click();
		$.ajax({
			url:url,
			type:'post',
			data:{
				action:'dodulieu',
				ma:ma
			},
			success: function(response){
				var result = JSON.parse(response);
				$("select[name=donvi]").children().removeAttr("selected");
				$("select[name=nganh]").children().removeAttr("selected");
				$("select[name=he]").children().removeAttr("selected");
				$("select[name=nam]").children().removeAttr("selected");
				$('select[name=donvi] option[value="'+result[0]['FK_iMaDonvi']+'"]').attr('selected','selected');
				$('select[name=nganh] option[value="'+result[0]['FK_iMaNganh']+'"]').attr('selected','selected');
				$('select[name=he] option[value="'+result[0]['FK_iMaHe']+'"]').attr('selected','selected');
				$('select[name=nam] option[value="'+result[0]['iNam']+'"]').attr('selected','selected');
                $('select').select2();
			}
		});
	});
	$(document).on('hide.bs.modal','.modal', function () { // remove selected
		$('input[name=ma]').val('');
		$('select[name=donvi] option[value=""]').attr('selected','selected');
        $('select[name=nganh] option[value=""]').attr('selected','selected');
        $('select[name=he] option[value=""]').attr('selected','selected');
        $('select[name=nam] option[value=""]').attr('selected','selected');
        $('select').select2();
    });
    $(document).on('change',"#allchuaxep",function () {
        $(this).parents('thead').find("input:checkbox").prop('checked', $(this).prop("checked"));
        
    });
    $(document).on('change',"#alldaxep",function () {
		// if(!$($(this).parents('thead').find("input:checkbox")).is(':disabled')) {
        	$(this).parents('thead').find("input:checkbox").not(':disabled').prop('checked', $(this).prop("checked"));
        // }
    });
    // click chuyến sang phải
    $('#sangphai').on('click', function(){
        var slchuaxep = parseInt($('#slchuaxep').text());
        var sldaxep = parseInt($('#sldaxep').text());
        var i = 0;
        $("input:checked").not('#allchuaxep').each(function () {
            row = $(this).closest('tr');
            if ($(this).closest('table').attr('id') == 'chuaxep') {
                row.children().children('input').prop('checked', false);
                row.insertAfter($('#daxep thead tr:first'));
                i++;
            }
        });
        $('#allchuaxep').prop('checked',false);
        $('#slchuaxep').html(slchuaxep - i)
    	if($('#slchuaxep').text() < 0) $('#slchuaxep').text(0);
    	$('#sldaxep').html(sldaxep + i);
    });
    // click chuyến sang trái
    $('#sangtrai').on('click', function(){
        var slchuaxep = parseInt($('#slchuaxep').text());
        var sldaxep = parseInt($('#sldaxep').text());
        var i = 0;
        $("input:checked").not('#alldaxep').each(function () {
            row = $(this).closest('tr');
            if ($(this).closest('table').attr('id') == 'daxep') {
                row.children().children('input').prop('checked', false);
                row.insertAfter($('#chuaxep thead tr:first'));
                i++;
            }
        });            
        $('#alldaxep').prop('checked',false);
        $('#slchuaxep').html(slchuaxep + i);
        $('#sldaxep').html(sldaxep - i);
    });
    // $('#searchbox').keyup(function(){

    // });
    $(document).on('click','button[name=capnhatmonhoc]',function(){//đổ dữ liệu vào input
    	dsmon= [];
    	var i=0;
        $('#daxep tr input:checkbox').not('#alldaxep').each(function () {
            dsmon[i++] =$(this).attr("value");
        });
		var ma=$(this).val();
		$('input[name=machuongtrinhdaotao]').val(ma);
		$.ajax({
			url:url,
			type:'post',
			data:{
				action:'dodulieumonhoc',
				ma:ma,
				dsmon:dsmon
			},
			success: function(response){
				var result = JSON.parse(response);
				var html='';
				html+="<tr class='active'>";
                    html+="<th class='text-center' style='width:20%'><input type='checkbox' id='allchuaxep' /></th>";
                    html+="<th class='text-middle' style='width:60%'>Môn học</th>";
                    html+="<th class='text-center' style='width:20%'>Số tín chỉ</th>";
                    html+="</tr>";
                var tongchuaxep=0;
				for(var j=0;j<result.length;j++)
				{
					if(result[j]['PK_iMaMon']>0)
					{
						html+="<tr class='tr_fs'>";
                        html+="<td class='text-center'><input type='checkbox' value='" + result[j]['PK_iMaMon'] + "'></td>" ;
                        html+="<td class='text-middle'>"+result[j]['sTenMon']+"</td>";
                        html+="<td class='text-center'>"+result[j]['sSotinchi']+"</td>";
                        html+="</tr>";
                        tongchuaxep++;
					}
				}
				$('#slchuaxep').html(tongchuaxep);
                $('#chuaxep>thead').html(html);
                var html2='';
                html2+="<tr class='active'>";
                html2+="<th class='text-center' style='width:20%'><input type='checkbox' id='alldaxep' /></th>";
                html2+="<th class='text-middle' style='width:60%'>Môn học</th>";
                html2+="<th class='text-center' style='width:20%'>Số tín chỉ</th>";
                html2+="</tr>";
                var tongdaxep=0;
				for(tongchuaxep;tongchuaxep<result.length;tongchuaxep++)
				{
					html2+="<tr>";
                    html2+="<td class='text-center'><input type='checkbox' value='' disabled='disabled'></td>" ;
                    html2+="<td class='text-middle'>"+result[tongchuaxep]['sTenMon']+"</td>";
                    html2+="<td class='text-center'>"+result[tongchuaxep]['sSotinchi']+"</td>";
                    html2+="</tr>";
                    tongdaxep++;
				}
				$('#sldaxep').html(tongdaxep);
                $('#daxep>thead').html(html2);
			}
		});
	});
	$('#searchbox').keyup(function(){
    	var k_in = $(this).val().toLowerCase();
    	$('.tr_fs').hide();
    	$('.tr_fs').each(function(){
    		var text = $(this).text().toLowerCase();
    		if(text.indexOf(k_in) != -1)
    		{
    			$(this).show();
    		}
    	});
    });
	$(document).on('click','#luucapnhatmon',function(){
		var r = confirm("Bạn đã chắc chắn muốn lưu các môn đã chọn không?");
	    if (r == true) {
	        var ma=$('input[name=machuongtrinhdaotao]').val();
			dsmon= [];
	    	var i=0;
	        $('#daxep tr input:checkbox').not('#alldaxep').each(function () {
	        	if(!$(this).is(':disabled')) {
			    	dsmon[i++] =$(this).attr("value");
			  	}
	        });
	        $.ajax({
	        	url:url,
	        	type:'post',
	        	data:{
	        		action:'themmonchuongtrinhdaotao',
					ma:ma,
					dsmon:dsmon
	        	},
	        	success: function(response){
					var result = JSON.parse(response);
					if(result>0)
					{	
						
						showMessage('Cập nhật môn chương trình đào tạo thành công!','success');
						// redirect('chuongtrinhdaotao');
					}
					else{
						showMessage('Cập nhật môn chương trình đào tạo thất bại!','error');
						// redirect('chuongtrinhdaotao');
						
					}
				}
	        });
	    } else {
	        return false;
	    }
	});
});