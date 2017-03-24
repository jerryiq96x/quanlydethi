<?php
/**
* 
*/
class Ckhoa extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('danhmuc/Mkhoa');
	}
	public function index()
	{
		$data['title'] = "Danh mục khoa thi";
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';

		if($this->input->post('xacnhan')) {
			$this->insertKhoa();
		}
		if($this->input->post('suakhoa'))
		{
			$idsua = $this->input->post('suakhoa');
			$data['button_name'] = 'capnhatkhoa';
			$data['button_value'] = 'Chỉnh sửa';
			$data['idsua'] = $idsua;
			$data['khoa'] = $this->Mkhoa->getByID($idsua);
			// pr($data['khoa']);
		}
		if($this->input->post('capnhatkhoa'))
		{
			$this->updateKhoa($this->input->post('hidden_id'));
		}
		if($this->input->post('xoakhoa')) {

			$id = $this->input->post('xoakhoa');
			$this->deleteKhoa($id);
		}
		$data['message'] = getMessages();
		$data['listEdit'] = $this->Mkhoa->getAll();
		$temp['data']     = $data;
		$temp['template'] ='danhmuc/Vkhoa';
		$this->load->view('layout/layout',$temp);
	}
	public function insertKhoa(){
		$dulieu_nganh = array(
			'sTenDonvi' => $this->input->post('tendonvi')
		);
		$kiemtra = $this->Mkhoa->insertKhoa($dulieu_nganh);
		if($kiemtra>0)
		{
			setMessages("success", "", "Thêm ngành thành công!");
			redirect(base_url().'khoa');
		}
		else
		{
			setMessages("error", "", "Thêm ngành thất bại!");
			redirect(base_url().'khoa');
		}
	}
	public function updateKhoa($id) {
		$nganh_data = array(
			'sTenDonvi' => $this->input->post('tendonvi')
		);
		$kiemtra = $this->Mkhoa->updateKhoa($id, $nganh_data);
		if($kiemtra>0)
		{
			setMessages("success", "", "Sửa ngành thành công!");
			redirect(base_url().'khoa');
		}
		else
		{
			setMessages("error", "", "Sửa ngành thất bại!");
			redirect(base_url().'khoa');
		}
	}
	public function deleteKhoa($id)
	{
		if(!empty($id))
		{
			$this->db->where('PK_iMaDonvi',$id);
			$this->db->delete('tbl_donvi');
			$kiemtra = $this->db->affected_rows();
			if($kiemtra>0)
		{
			setMessages("success", "", "Xóa ngành thành công!");
			redirect(base_url().'khoa');
		}
		else
		{
			setMessages("error", "", "Xóa ngành thất bại!");
			redirect(base_url().'khoa');
		}
		}
	}
}
?>