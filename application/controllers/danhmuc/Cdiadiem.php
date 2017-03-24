<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdiadiem extends MY_Controller {

	public $_title   = 'Danh sách địa điểm';

	public function __construct() {
		parent:: __construct();
		$this->load->model('danhmuc/Mdiadiem'); 
	}

	public function index()
	{
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';
		
		//Bấm thêm môn
		if($this->input->post('xacnhan')) {
			$this->ThemDiaDiem();
		}

		//Bấm sửa môn
		if($this->input->post('suadiadiem'))
		{
			$data['button_name'] = 'capnhatdiadiem';
			$data['button_value'] = 'Chỉnh sửa';
		}
		//Sửa môn
		if($this->input->post('capnhatdiadiem'))
		{
			$this->CapNhatDiaDiem();
		}
		//Xóa môn
		if($this->input->post('xoadiadiem')) {

			$id = $this->input->post('xoadiadiem'); //lấy giá trị tại name là xóa môn ở view
			// print_r($id); exit();
			$this->XoaDiaDiem($id);
		}
		$data['message'] = getMessages();
		$data['danhsachdiadiem'] = $this->Mdiadiem->LayDanhSachDiaDiem();
		$data['diadiem'] = $this->LayDuLieuDiaDiem();
		$data['title']    = $this->_title;
		$temp['data']     = $data;
		$temp['template'] ='danhmuc/Vdiadiem';
		$this->load->view('layout/layout',$temp);
	}

	//Thêm môn
	public function ThemDiaDiem(){
		$dulieu_diadiem = array(
			'sTenDV' => $this->input->post('tendonvi'),
			'sdiadiem' => $this->input->post('diadiem')
		);
		$kiemtra = $this->Mdiadiem->themDuLieu($dulieu_diadiem);
		if($kiemtra>0)
		{
			setMessages("success", "", "Thêm địa điểm thành công!");
			redirect(base_url().'diadiem');
		}
		else
		{
			setMessages("error", "", "Thêm địa điểm thất bại!");
		}
	}
	//Xóa môn
	public function XoaDiaDiem($id)
	{
		// $ma = $this->input->post('hidden_id');
		if(!empty($id))
		{
			$kiemtra = $this->Mdiadiem->Xoadulieu($id);
			if($kiemtra > 0)
			{
				setMessages("success", "", "Xóa địa điểm thành công!");
				redirect(base_url().'diadiem');
			}
			else
				setMessages("error", "", "Có lỗi!");
			}
		
	}
	//Lấy dữ liệu
	public function LayDuLieuDiaDiem() {
		if($this->input->post('suadiadiem')) {
			$ma = $this->input->post('suadiadiem');
			return $this->Mdiadiem->LayDanhSachDiaDiem($ma); 
		}
	}
	//Cập nhật lại môn
	public function CapNhatDiaDiem() {
		$ma = $this->input->post('hidden_id');
		$dd_data = array(
			'sTenDV' => $this->input->post('tendonvi'),
			'sdiadiem' => $this->input->post('diadiem')
		);
		$kiemtra = $this->Mdiadiem->CapNhatDiaDiem($ma, $dd_data);
		if($kiemtra>0)
		{
			setMessages("success", "", "Sửa địa điểm thành công!");
			redirect(base_url().'diadiem');
		}
		else
		{
			setMessages("error", "", "Sửa địa điểm thất bại!");
		}
			
	}

}

?>