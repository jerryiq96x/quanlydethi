//ajax đổ hệ - ngành - môn - năm
$(document).ready(function(){
	$(document).on('change','select[name=txtDV]',function(){
		getHebyID();
		$('#ok').attr('disabled','');
	});
	$(document).on('change','select[name=txtHe]',function(){
		getNganhbyID();
		$('#ok').attr('disabled','');
	});
	$(document).on('change','select[name=txtNganh]',function(){
		getTrinhdobyID();

		$('#ok').attr('disabled','');
	});
	$(document).on('change','select[name=txtTrinhdo]',function(){
		getNambyID();
		$('#ok').attr('disabled','');
	});
	$(document).on('change','select[name=txtNam]',function(){
		getMonbyID();
		$('#ok').attr('disabled','');
	});
	$(document).on('change','select[name=txtMon]',function(){
		getMonCTDTbyID();
	});
});
function getHebyID()
{
	var url = window.location.href;
	$.ajax({
		url: url,
		type: 'POST',
		async: false,
		data:{
			'action' : 'getHe',
			'IDdonvi' : $('select[name=txtDV]').val()
		},
		success: function(response){
			var rs = JSON.parse(response);
			if(rs.length > 0)
			{
				var html="";
				var html2="";
				var html3="";
				var html4="";
					html += '<label for="">Hệ đào tạo: </label>';
					html += '<select class="form-control" name="txtHe">';
					html += '<option>--Hệ đào tạo--</option>';
					$.each(rs, function(key,item){
						html += '<option value="'+item['PK_iMaHe']+'">'+item['sTenHe']+'</option>';
					});
					html += '</select>';
					html2 += '<label for="">Năm: </label>';
					html2 += '<select class="form-control" disabled>';
					html2 += '<option>--Năm--</option>';
					html3 += '<label for="">Môn: </label>';
					html3 += '<select class="form-control" disabled>';
					html3 += '<option>--Môn--</option>';
					html4 += '<label for="">Ngành: </label>';
					html4 += '<select class="form-control" disabled>';
					html4 += '<option>--Ngành đào tạo--</option>';
				$('#dhe').html(html);
				$('#erDV').html('');
				$('#dnam').html(html2);
				$('#dmon').html(html3);
				$('#dnganh').html(html4);
				$('select[name=txtHe]').removeAttr('disabled');
			}
			else{
				var html="";
				var html2="";
				var html3="";
				var html4="";
				$('#erDV').html('Đơn vị này chưa có trong CTĐT');
				html4 += '<label for="">Hệ đào tạo: </label>';
				html4 += '<select class="form-control" disabled>';
				html4 += '<option>--Hệ đào tạo--</option>';
				html += '<label for="">Ngành đào tạo: </label>';
				html += '<select class="form-control" disabled>';
				html += '<option>--Ngành đào tạo--</option>';
				html2 += '<label for="">Năm: </label>';
				html2 += '<select class="form-control" disabled>';
				html2 += '<option>--Năm--</option>';
				html3 += '<label for="">Môn: </label>';
				html3 += '<select class="form-control" disabled>';
				html3 += '<option>--Môn--</option>';
				$('#dnganh').html(html);
				$('#dnam').html(html2);
				$('#dmon').html(html3);
				$('#dhe').html(html4);
				$('#ok').attr('disabled','');
			}
		}
	});
}
function getNganhbyID()
{
	var url = window.location.href;
	$.ajax({
			url: url,
			type: 'POST',
			async: false,
			data: {
				'action' : 'getNganh',
				'IDHe'	 : $('select[name=txtHe]').val(),
				'IDdonvi' : $('select[name=txtDV]').val()
			},
			success: function(response){
				var rs = JSON.parse(response);
				if(rs.length > 0)
				{	
					var html="";
					var html2="";
					var html3="";

						html += '<label for="">Ngành đào tạo: </label>';
						html += '<select class="form-control" name="txtNganh">';
						html += '<option>--Ngành đào tạo--</option>';
						$.each(rs, function(key,item){
							html += '<option value="'+item['PK_iMaNganh']+'">'+item['sTenNganh']+'</option>';
						});
						html += '</select>';
						html2 += '<label for="">Năm: </label>';
						html2 += '<select class="form-control" disabled>';
						html2 += '<option>--Năm--</option>';
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
					$('#dnganh').html(html);
					$('#erHe').html('');
					$('#dnam').html(html2);
					$('#dmon').html(html3);
					$('select[name=txtNganh]').removeAttr('disabled');
				}
				else{
					var html="";
					var html2="";
					var html3="";
						html += '<label for="">Ngành đào tạo: </label>';
						html += '<select class="form-control" disabled>';
						html += '<option>--Ngành đào tạo--</option>';
						html2 += '<label for="">Năm: </label>';
						html2 += '<select class="form-control" disabled>';
						html2 += '<option>--Năm--</option>';
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
					$('#dnganh').html(html);
					$('#dnam').html(html2);
					$('#dmon').html(html3);
					$('#ok').attr('disabled','');
				}
			}
		});
}
function getTrinhdobyID()
{
	var url = window.location.href;
	$.ajax({
			url: url,
			type: 'POST',
			async: false,
			data: {
				'action' : 'getTrinhdo',
				'IDHe'	 : $('select[name=txtHe]').val(),
				'IDdonvi' : $('select[name=txtDV]').val(),
				'IDnganh': $('select[name=txtNganh]').val()
			},
			success: function(response){
				var rs = JSON.parse(response);
				if(rs.length > 0)
				{	
					var html="";
					var html2="";
					var html3="";

						html += '<label for="">Trình độ: </label>';
						html += '<select class="form-control" name="txtTrinhdo">';
						html += '<option>--Trình độ đào tạo--</option>';
						$.each(rs, function(key,item){
							html += '<option value="'+item['PK_iMaTrinhdo']+'">'+item['sTentrinhdo']+'</option>';
						});
						html += '</select>';
						html2 += '<label for="">Năm: </label>';
						html2 += '<select class="form-control" disabled>';
						html2 += '<option>--Năm--</option>';
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
					$('#dtrinhdo').html(html);
					$('#dnam').html(html2);
					$('#dmon').html(html3);
					$('select[name=txtTrinhdo]').removeAttr('disabled');
				}
				else{
					var html="";
					var html2="";
					var html3="";
					var html4="";
						html4 += '<label for="">Trình độ: </label>';
						html4 += '<select class="form-control" disabled>';
						html4 += '<option>--Trình độ đào tạo--</option>';
						html2 += '<label for="">Năm: </label>';
						html2 += '<select class="form-control" disabled>';
						html2 += '<option>--Năm--</option>';
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
					$('#dtrinhdo').html(html4);
					$('#dnam').html(html2);
					$('#dmon').html(html3);
					$('#ok').attr('disabled','');
				}
			}
		});
}
//get ngành
function getNambyID()
{
	var url = window.location.href;
	$.ajax({
			url: url,
			type: 'POST',
			async: false,
			data: {
				'action' 	 : 'getNam',
				'IDnganh'	 : $('select[name=txtNganh]').val(),
				'IDHe'	 	 : $('select[name=txtHe]').val(),
				'IDdonvi' 	 : $('select[name=txtDV]').val(),
				'IDtrinhdo'	 : $('select[name=txtTrinhdo]').val()
			},
			success: function(response){
				var rs = JSON.parse(response);
				if(rs.length > 0)
				{	var html="";
					var html3="";
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
						html += '<label for="">Năm: </label>';
						html += '<select class="form-control" name="txtNam">';
						html += '<option>--Năm--</option>';
						$.each(rs, function(key,item){
							html += '<option value="'+item['iNam']+'">'+item['iNam']+'</option>';					
						});
						html += '</select>';
					$('#dnam').html(html);
					$('#dmon').html(html3);
					$('select[name=txtNam]').removeAttr('disabled');
				}
				else{
					var html="";
					var html3="";
						html += '<label for="">Năm: </label>';
						html += '<select class="form-control" disabled>';
						html += '<option>--Năm--</option>';
						html3 += '<label for="">Môn: </label>';
						html3 += '<select class="form-control" disabled>';
						html3 += '<option>--Môn--</option>';
					$('#dnam').html(html);
					$('#dmon').html(html3);
					$('#ok').attr('disabled','');
				}
			}
		});
}

function getMonbyID()
{
	var url = window.location.href;
	$.ajax({
			url: url,
			type: 'POST',
			async: false,
			data: {
				'action' 	 : 'getMon',
				'IDnganh'	 : $('select[name=txtNganh]').val(),
				'IDHe'	 	 : $('select[name=txtHe]').val(),
				'Nam'	 	 : $('select[name=txtNam]').val(),
				'IDdonvi' : $('select[name=txtDV]').val(),
				'IDtrinhdo'	 : $('select[name=txtTrinhdo]').val()
			},
			success: function(response){
				var rs = JSON.parse(response);
				if(rs != "error")
				{	
					var html="";
						html += '<label for="">Môn: </label>';
						html += '<select class="form-control" name="txtMon">';
						html += '<option>--Môn--</option>';
					$.each(rs, function(key,item){
						html += '<option value="'+item['PK_iMaMon']+'">'+item['sTenMon']+'</option>';					
					});
					$('#dmon').html(html);
					$('select[name=txtMon]').select2();
					$('select[name=txtKhoaphu]').removeAttr('disabled');
				}
				else{
					var html="";
						html += '<label for="">Môn: </label>';
						html += '<select class="form-control" disabled>';
						html += '<option>--Môn--</option>';
					$('#dmon').html(html);
					$('#ok').attr('disabled','');
				}
			}
		});
}
function getMonCTDTbyID()
{
	var url = window.location.href;
	$.ajax({
			url: url,
			type: 'POST',
			async: false,
			data: {
				'action' 	 : 'getMonCTDT',
				'IDnganh'	 : $('select[name=txtNganh]').val(),
				'IDHe'	 	 : $('select[name=txtHe]').val(),
				'Nam'	 	 : $('select[name=txtNam]').val(),
				'Mon'		 : $('select[name=txtMon]').val(),
				'IDdonvi' 	 : $('select[name=txtDV]').val(),
				'IDtrinhdo'	 : $('select[name=txtTrinhdo]').val()
			},
			success: function(response){
				var rs = JSON.parse(response);
				if(rs.length > 0)
				{	
					var html="";
					$.each(rs, function(key,item){
						html += '<input type="text" class="hide" name="txtMaMonCTDT" value="'+item['PK_iMaMonCTDT']+'">';
					});
					$('#hd_inp').html(html);
					$('#dkhoaphu').removeClass('hide');
					$('#ok').removeAttr('disabled');
				}
				else{
					$('#hd_inp').html('');
					$('#ok').attr('disabled','');
				}
			}
		});
}