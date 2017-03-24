<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdangnhap extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mdangnhap');
	}
	public function index()
	{
		$data['url'] = base_url();
		$data['ketqua']='';
		if($this->input->post('dangnhap'))
		{
			$ketqua         =$this->DangNhap();
			$data['ketqua'] = $ketqua; 
		}
		$this->parser->parse('Vdangnhap', $data, FALSE);
	}

	// đăng nhập
	public function DangNhap()
	{
		$taikhoan=$this->input->post('taikhoan');
		$matkhau=sha1($this->input->post('matkhau'));
		$rs=$this->Mdangnhap->kiemtraDangNhap($taikhoan,$matkhau);
		if(!empty($rs))
		{	
			$session_data=array('dethi'=>$rs);
			$this->session->set_userdata($session_data);
			redirect(base_url().'welcome.html');
		}
		else{
			return 'failed';
		}
	}
	// đăng xuất
	public function DangXuat() {
		$this->session->userdata = array();
		$this->session->sess_destroy();
		$this->input->set_cookie('', '', time()-36000);
		redirect(base_url().'dangnhap');
		exit();
	}

}
/* End of file Cdangnhap.php */
/* Location: ./application/controllers/dangnhap/Cdangnhap.php */