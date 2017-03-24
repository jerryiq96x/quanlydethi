	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('img[name=anhdaidien]')
                .attr('src', e.target.result)
        };
        reader.readAsDataURL(input.files[0]);
    }
}
	/* --------------------------------- Hàm thông báo------------------------------ */

	 function showMessage(text, type) {
	    var notice = new PNotify({
	        title: 'Thông báo',
	        text: text,
	        type: type,
	        delay: 5000,
	        icon: 'glyphicon glyphicon-info-sign',
	        addclass: 'snotify',
	        sticker: false,
	        hide: true
	    });
	}
	function timetodate(dateObject) {
        var d = new Date(dateObject*1000);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) {
            day = "0" + day;
        }
        if (month < 10) {
            month = "0" + month;
        }
        var date = day + "/" + month + "/" + year;

        return date;
    };
	function chuanhoa(obj)
	{		
		var show = '';
		var string=obj.value;
		var m = string.split(' ');
		for(var i=0; i<m.length;i++)
		{
			if(m[i]!='')
			{
				var chu=m[i].charAt(0).toUpperCase()+m[i].slice(1).toLowerCase()
				show+=chu+' ';
			}
		}
		show=show.trim();
		obj.value = show;
	}
	// convert ngày tháng đẻ so sánh thời gian
	function convertdate(ngaythang) {
        split = ngaythang.split('/'); 
        ngaythang = [split[1], split[0], split[2]].join('/');
        return new Date(ngaythang);
    }
	// get url
	function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
    }

    // var first = getUrlVars()["id"];
    // var second = getUrlVars()["page"];

	// get name
	function getParameterByName(name) {
		name      = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	
	function redirect(duongdan) {
		return window.location.href = $('base').attr('href') + duongdan;
	}
	// acitve tab
	$(document).ready(function() {
		// regex
		$.validator.addMethod("regex",function (value, element, regexp) {
        var re = new RegExp(regexp);return this.optional(element) || re.test(value);
    	},"Có lỗi xảy ra, vui lòng kiểm tra lại.");

    	// acitve tab
	    var url=window.location.href;
	    var kiemtra1=url.split("/");
	    var kiemtra2=url.split("?");
	    if(kiemtra2.length>1)
	    {
	    	url=kiemtra2[0];
	    }
	    else{
	    	url=kiemtra1[0]+'/'+kiemtra1[1]+'/'+kiemtra1[2]+'/'+kiemtra1[3]+'/'+kiemtra1[4];
	    }
	    $('.treeview-menu a').each(function(e){
	        var link = $(this).attr('href');
	        if(link==url){
	            $(this).parent('li').addClass('active');
	            $(this).closest('.treeview').addClass('active');
	        }
	    }); 
	    $('.treeview > a').each(function(e){
	        var link = $(this).attr('href');
	        if(link==url){
	            $(this).parent('li').addClass('active');
	            // $(this).closest('.treeview').addClass('active');
	        }
	    }); 
	    // Bootstrap WYSIHTML5
	    $(".textarea").wysihtml5();
	    

	    // click chọn ảnh
	    $('img[name=anhdaidien]').click(function() {
	    	 $('input[name=chonanh]').click();
	    });
  	}); 
  	$(function () {
  		// datatable
  		$(".example").DataTable();
  		//Initialize Select2 Elements
    	$(".select2").select2();
    	$("[data-mask]").inputmask();
  		// checkbox
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      	checkboxClass: 'icheckbox_flat-green',
	      	radioClass: 'iradio_flat-green'
	    });
  	});