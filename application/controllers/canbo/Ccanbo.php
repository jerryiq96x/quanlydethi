<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccanbo extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('canbo/mcanbo');
	}

	public function index()
	{
		$data['title']    = 'Danh sách cán bộ';
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';
		$data['danhsachcb'] = $this->mcanbo->Listcanbo();
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['message'] = getMessages();
		$temp['data']     = $data;
		$temp['template'] ='canbo/Vcanbo';
		$this->load->view('layout/layout',$temp);

	}
}