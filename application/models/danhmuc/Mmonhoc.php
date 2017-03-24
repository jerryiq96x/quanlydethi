<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmonhoc extends CI_Model {
	protected $_table = 'tbl_mon';
	public function __construct() {
		parent::__construct();
	}

	//Thêm môn

	public function themDuLieu($data = array()){
		// Kiểm tra môn đã tồn tại chưa
		$this->db->insert($this->_table,$data);
		return $this->db->affected_rows();
	}
 
	//Lấy danh sách môn
	public function LayDanhSachMon($id = NULL){
		// Lấy 1 bản ghi để sửa nếu không có $id -> lấy toàn bộ bản ghi
		if($id){
			$this->db->where('PK_iMaMon ', $id);
		}
		$this->db->select('*');
		return $this->db->get('tbl_mon')->result_array();
	}

	//Cập nhật lại môn
	public function CapNhatMon($id, $data = array()) {
	// Kiểm tra dữ liệu nhập đã tồn tại trong CSDL hay chưa?
		$this->db->where('PK_iMaMon', $id);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}

	//Xóa môn
	public function Xoadulieu($id = null) {
		//Kiểm tra xem có tồn tại $id không
			$this->db->where('PK_iMaMon', $id);
			$this->db->delete($this->_table);
			return $this->db->affected_rows();
	}
	
} 
?>