<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cchitietthongke extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dethi/Mbaocaothongke');
	}
	public function index()
	{
		$data['title']       ='Chi tiết báo cáo thống kê';
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$trangthai           =$this->uri->segment(2);
		$mamonctdt           =$this->uri->segment(3);
		$data['chitiet']     =$this->Mbaocaothongke->chitietthongke($trangthai,$mamonctdt);
		$temp['data']        =$data;
		$temp['template']    ='dethi/Vchitietthongke';
		$this->load->view('layout/layout',$temp);
	}

}

/* End of file Cchitietthongke.php */
/* Location: ./application/controllers/dethi/Cchitietthongke.php */