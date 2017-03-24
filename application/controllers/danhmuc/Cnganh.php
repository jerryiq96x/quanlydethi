<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnganh extends MY_Controller {

	public $_title   = 'Danh sách ngành';

	public function __construct() {
		parent:: __construct();
		$this->load->model('danhmuc/Mnganh'); 
	}

	public function index()
	{
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';
		
		//Bấm thêm 
		if($this->input->post('xacnhan')) {
			$this->ThemNganh();
		}

		//Bấm sửa môn
		if($this->input->post('suanganh'))
		{
			$data['button_name'] = 'capnhatnganh';
			$data['button_value'] = 'Chỉnh sửa';
			$data['listEdit'] = $this->Mnganh->LayDanhSachNganh($this->input->post('suanganh'));
			// print_r($data['listEdit']); exit();

		}
		//Sửa môn
		if($this->input->post('capnhatnganh'))
		{
			$this->CapNhatNganh();
		}
		//Xóa môn
		if($this->input->post('xoanganh')) {

			$id = $this->input->post('xoanganh');
			$this->XoaNganh($id);
		}
		$data['message'] = getMessages();
		$data['danhsachnganh'] = $this->Mnganh->LayDanhSachNganh();
		$data['nganh'] = $this->LayDuLieuNganh();
		$data['title']    = $this->_title;
		$temp['data']     = $data;
		$temp['template'] ='danhmuc/Vnganh';
		$this->load->view('layout/layout',$temp);
	}

	//Thêm môn
	public function ThemNganh(){
		$dulieu_nganh = array(
			'sTenNganh' => $this->input->post('tennganh')
		);
		$kiemtra = $this->Mnganh->themDuLieu($dulieu_nganh);
		if($kiemtra>0)
		{
			setMessages("success", "", "Thêm ngành thành công!");
			redirect(base_url().'nganh');
		}
		else
		{
			setMessages("error", "", "Thêm ngành thất bại!");
		}
	}
	//Xóa môn
	public function XoaNganh($id)
	{
		// $ma = $this->input->post('hidden_id');
		if(!empty($id))
		{
			$kiemtra = $this->Mnganh->Xoadulieu($id);
			if($kiemtra > 0)
			{
				setMessages("success", "", "Xóa ngành thành công!");
				redirect(base_url().'nganh');
			}
			else
				setMessages("error", "", "Có lỗi!");
			}
		
	}
	//Lấy dữ liệu
	public function LayDuLieuNganh() {
		if($this->input->post('suanganh')) {
			$manganh = $this->input->post('suanganh');
			return $this->Mnganh->LayDanhSachNganh($manganh); 
		}
	}
	//Cập nhật lại môn
	public function CapNhatNganh() {
		$manganh = $this->input->post('hidden_id');
		$nganh_data = array(
			'sTenNganh' => $this->input->post('tennganh')
		);
		$kiemtra = $this->Mnganh->CapNhatNganh($manganh, $nganh_data);
		if($kiemtra>0)
		{
			setMessages("success", "", "Sửa ngành thành công!");
			redirect(base_url().'nganh');
		}
		else
		{
			setMessages("error", "", "Có lỗi!");
		}
	}
}

?>