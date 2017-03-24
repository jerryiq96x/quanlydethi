$(document).ready(function() {
	$(document).on('change','input[name=taikhoan]',function(){
		checkAcc();
	});
	// $(document).on("change","#nhaplaimk",function(){
	// 	newpass();
	// });
});
function checkAcc()
{
	var url = window.location.href;
	$.ajax({
		url: url,
		type: 'POST',
		data:{
			'action': 'taikhoan',
			'Acc': $('input[name=taikhoan]').val()
		},
		success: function(response)
		{
			var rs = JSON.parse(response);
			if(rs == 'error')
			{
				$('#error').html('Tài khoản đã tồn tại. Vui lòng nhập tài khoản khác!');
				$('#xacnhan').prop("type", "button");
			}
			else
			{
				var html = '';
				$('#error').html(html);
				$('#xacnhan').prop("type", "submit");
			}
		}
	});
}
// function newpass()
// {
// 	var mk1 = $('#matkhaumoi').val();
// 	var mk2 = $('#nhaplaimk').val();
// 	if(mk1 != mk2)
// 	{
// 		$('#error_mk').html('Mật khẩu nhập lại không đúng!');
// 		$('#xacnhan').prop("type", "button");
// 	}
// 	else
// 	{
// 		var html ="";
// 		$('#error_mk').html(html);
// 		$('#xacnhan').prop("type", "submit");
// 	}
// }