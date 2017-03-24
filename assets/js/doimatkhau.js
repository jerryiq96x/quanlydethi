$(document).ready(function(){
	$(document).on("change","#matkhaucu",function(){
		checkpass();
	});
	$(document).on("change","#nhaplaimk",function(){
		newpass();
	});
	// ("#matkhaumoi").on('change',function(){
	// 	newpass();
	// });
})
function checkpass()
{
	var url = window.location.href;
	$.ajax({
		url: url,
		type: 'POST',
		data:{
			'action': 'oldpass',
			'oldpass': $('#matkhaucu').val()
		},
		success: function(response){
			var rs = JSON.parse(response);
			if(rs != "error")
			{
				var html ="";
				$('#old').addClass("has-feedback");
				$('#old').addClass('has-success');
				$('#sp').addClass('glyphicon');
				$('#sp').addClass('glyphicon-ok');
				$('#sp').addClass('form-control-feedback');
				$('#sp').html(html);
				$('#submit').prop("type", "submit");
			}
			else{
				var html = "";
				$('#old').removeClass('has-feedback');
				$('#old').removeClass('has-success');
				$('#sp').removeClass('glyphicon');
				$('#sp').removeClass('glyphicon-ok');
				$('#sp').removeClass('form-control-feedback');
				html += '<span id="sp" style="color: red;"><b>Mật khẩu cũ không đúng. Vui lòng nhập lại</b></span>';
				$('#sp').html(html);
				$('#submit').prop("type", "button");
			}
		}
	});//end ajax
}
function newpass()
{
	var mk1 = $('#matkhaumoi').val();
	var mk2 = $('#nhaplaimk').val();
	if(mk1 != mk2)
	{
		$('#error_mk').html('Mật khẩu nhập lại không đúng!');
		$('#submit').prop("type", "button");
	}
	else
	{
		var html ="";
		$('#error_mk').html(html);
		$('#submit').prop("type", "submit");
	}
}