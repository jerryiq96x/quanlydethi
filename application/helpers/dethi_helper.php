<?php 
	if(! function_exists('pr'))
	{
		function pr($data) {
			echo "<meta charset='UTF-8' />";
			echo "<pre>";
				print_r ($data);
			echo "</pre>";

			exit();
		}
	}
	//kiểm tra đường dẫn
	if (!function_exists('checkPermission')){
	    function checkPermission($maquyen, $chucnang){
	        $CI =& get_instance();
	        
	        // print_r($CI);
	        $CI->load->model('Mdangnhap');
	        return $CI->Mdangnhap->checkLink($maquyen, $chucnang);
	    }
	}
	// random 6 số
	function random6so()
	{
		return $random = substr(str_shuffle("0129548323454567890198234567890129303455949151526423456787543234678765434678762346643456787643456789874816269476789"), 0, 6);
	}
	// kiểm tra đường dẫn file
	function kiemtraduongdan($filename)
	{
		if (file_exists("file/".$filename)) {
		    return $data['duongdan']='dung';
		} else {
		    return $data['duongdan']='sai';
		}
	}
	function duongdananh($macanbo)
	{
		if (file_exists("assets/img/".$macanbo.".jpg")) {
		    return $data['duongdananh']='dung';
		} else {
		    return $data['duongdananh']='';
		}
	}
	//2 hàm thông báo
	function setMessages($toastType = "", $title = "", $message = "") {
        $CI =& get_instance();
        $dataMessage = array(
            'type' => $toastType,
            'title' => $title,
            'message' => $message
        );
        $CI->session->set_flashdata('notification', $dataMessage);
    }


    function getMessages() {
        $CI =& get_instance();
        return $CI->session->flashdata('notification');
    }
	// id tự tăng
	function created_id($prefix, $number_id) {
		$number_id += 1;
		
		switch(strlen($number_id)) {
			case 1:
			$result = $prefix."_0".$number_id;
			break;
		
			case 2:
			$result = $prefix."_".$number_id;
			break;
			
			default:
			$result = $prefix."_".$number_id;
			break;
		}
		
		return $result;
	}

	/* ------------------------------------ Thời gian dạng giây từ năm 1970 ------------------------------- */
	function unix_time($date) {
		$date = strtotime(str_replace('/', '-', $date));
		return $date;
	}
	// thông báo showmessage
	function messagebox($content = '',$class = '') {
		return array(
			'content' => $content,
			'class' => $class
		);
	}
	function clean($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ')
    );
        foreach($unicode as $nonUnicode=>$uni){
            foreach($uni as $value)
            $str = @str_replace($value,$nonUnicode,$str);
            $str = preg_replace("/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/","-",$str);
            $str = preg_replace("/-+-/","-",$str);
            $str = preg_replace("/^\-+|\-+$/","",$str);
        }
        return strtolower($str);
    }

?>