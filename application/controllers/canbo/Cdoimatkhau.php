<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdoimatkhau extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('canbo/Mdoimatkhau');
	}

	public function index()
	{
		// bấm nút xác nhận
		$data['title'] = 'Đổi mật khẩu';
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$idCB = $this->_session['PK_sMaCB'];
		// pr($idCB);
		$action = $this->input->post('action');
		switch ($action) {
			case 'oldpass':
					$this->checkpass($idCB);
				break;
			
			default:
				# code...
				break;
		}
		if($this->input->post('ok')) {
			$this->changePass($idCB);
		}
		$data['message'] = getMessages();
		$temp['data']     = $data;
		$temp['template'] ='canbo/Vdoimatkhau';
		$this->load->view('layout/layout',$temp);
	}
	function changePass($idCB)
	{
		$arr = array(
			"sMatKhau" => sha1($this->input->post('nhaplaimk')) 
		);
		$rs = $this->Mdoimatkhau->changePass($idCB,$arr);
		if($rs > 0)
		{
			setMessages("success", "", "Đổi mật khẩu thành công! Xin mời đăng nhập lại.");
    		// redirect(base_url().'dsdethi');
    		$this->session->sess_destroy();
    		redirect(base_url().'dangnhap');
		}
		else
		{
			setMessages("error", "", "Có lỗi! Vui lòng thử lại");
		}
	}
	public function checkpass($idCB){
		$old = sha1($this->input->post('oldpass'));
		// $data = $old;
		$rs = $this->Mdoimatkhau->checkpass($idCB,$old);
		if(!empty($rs))
		{
			$data = 'ok';
		}
		else
		{
			$data = 'error';
		}
		echo json_encode($data);
		exit();
	}
}

/* End of file Cdoimatkhau.php */
/* Location: ./application/controllers/canbo/Cdoimatkhau.php */