<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmonhoc extends MY_Controller {

	public $_title   = 'Danh sách môn học';

	public function __construct() {
		parent:: __construct();
		$this->load->model('danhmuc/Mmonhoc'); 
	}

	public function index()
	{
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';
		
		//Bấm thêm môn
		if($this->input->post('xacnhan')) {
			$this->ThemMon();
		}

		//Bấm sửa môn
		if($this->input->post('suamon'))
		{
			$data['button_name'] = 'capnhatmon';
			$data['button_value'] = 'Chỉnh sửa';
		}
		//Sửa môn
		if($this->input->post('capnhatmon'))
		{
			$this->CapNhatMon();
		}
		//Xóa môn
		if($this->input->post('xoamon')) {

			$id = $this->input->post('xoamon'); //lấy giá trị tại name là xóa môn ở view
			// print_r($id); exit();
			$this->XoaMon($id);
		}
		$data['message'] = getMessages();
		$data['danhsachmon'] = $this->Mmonhoc->LayDanhSachMon();
		$data['mon'] = $this->LayDuLieuMon();
		$data['title']    = $this->_title;
		$temp['data']     = $data;
		$temp['template'] ='danhmuc/Vmonhoc';
		$this->load->view('layout/layout',$temp);
	}

	//Thêm môn
	public function ThemMon(){
		$dulieu_mon = array(
			'sTenMon' => $this->input->post('tenmon'),
			'sTenKhac' => $this->input->post('tenmonkhac'),
			'sSotinchi' => $this->input->post('tinchi')
		);
		$kiemtra = $this->Mmonhoc->themDuLieu($dulieu_mon);
		if($kiemtra>0)
		{
			setMessages("success", "", "Thêm môn thành công!");
			redirect(base_url().'monhoc');
		}
		else
		{
			setMessages("error", "", "Thêm môn thất bại!");
		}
	}
	//Xóa môn
	public function XoaMon($id)
	{
		// $ma = $this->input->post('hidden_id');
		if(!empty($id))
		{
			$kiemtra = $this->Mmonhoc->Xoadulieu($id);
			if($kiemtra > 0)
			{
				setMessages("success", "", "Xóa môn thành công!");
				redirect(base_url().'monhoc');
			}
			else
				setMessages("error", "", "Có lỗi!");
			}
		
	}
	//Lấy dữ liệu
	public function LayDuLieuMon() {
		if($this->input->post('suamon')) {
			$ma_mon = $this->input->post('suamon');
			return $this->Mmonhoc->LayDanhSachMon($ma_mon); 
		}
	}
	//Cập nhật lại môn
	public function CapNhatMon() {
		$mamon = $this->input->post('hidden_id');
		$mon_data = array(
			'sTenMon' => $this->input->post('tenmon'),
			'sTenKhac' => $this->input->post('tenmonkhac'),
			'sSotinchi' => $this->input->post('tinchi')
		);
		$kiemtra = $this->Mmonhoc->CapNhatMon($mamon, $mon_data);
		if($kiemtra>0)
		{
			setMessages("success", "", "Sửa môn thành công!");
			redirect(base_url().'monhoc');
		}
		else
		{
			setMessages("error", "", "Sửa môn thất bại!");
		}
	}

}

?>