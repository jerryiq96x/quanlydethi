<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnganh extends CI_Model {
	protected $_table = 'tbl_nganh';
	public function __construct() {
		parent::__construct();
	}

	//Thêm môn

	public function themDuLieu($data = array()){
		// Kiểm tra môn đã tồn tại chưa
		$this->db->insert($this->_table,$data);
		return $this->db->affected_rows();
	}
	// public function listEdit($id)
	// {
	// 	$this->db->where('PK_iMaNganh',$id);
	// 	$this->db->select('sTenNganh,PK_iMaNganh');
	// 	return $this->db->get('tbl_nganh')->result_array();
	// }
	//Lấy danh sách môn
	public function LayDanhSachNganh($id = NULL){
		// Lấy 1 bản ghi để sửa nếu không có $id -> lấy toàn bộ bản ghi
		if($id){
			$this->db->where('PK_iMaNganh ', $id);
		}
		$this->db->select('PK_iMaNganh, sTenNganh');
		return $this->db->get('tbl_nganh')->result_array();
	}

	//Cập nhật lại môn
	public function CapNhatNganh($id, $data = array()) {
	// Kiểm tra dữ liệu nhập đã tồn tại trong CSDL hay chưa?
		$this->db->where('PK_iMaNganh', $id);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}

	//Xóa môn
	public function Xoadulieu($id = null) {
		//Kiểm tra xem có tồn tại $id không
			$this->db->where('PK_iMaNganh', $id);

			$this->db->delete($this->_table);
			return $this->db->affected_rows();
	}
	
} 
?>