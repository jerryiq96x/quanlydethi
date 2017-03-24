<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcanbo extends CI_Model {

	protected $_table = 'tbl_canbo';
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//Thêm cán bộ

	public function themDuLieu($tk,$data = array()){
		// Kiểm tra cán bộ đã tồn tại chưa
		$this->db->where('sTaiKhoan',$tk);
		$rs = $this->db->get('tbl_canbo')->result_array();
		if(!empty($rs)){
			return false;
		}else{
			$this->db->insert($this->_table,$data);
			return $kiemtra=$this->db->affected_rows();
		}
	}
	public function checkAcc($acc)
	{
		$this->db->where('sTaiKhoan',$acc);
		$q = $this->db->get('tbl_canbo')->num_rows();
		return $q;
	}
	public function getQuyen()
	{
		return $this->db->get('tbl_quyen')->result_array();
	}
	//Lấy danh sách cán bộ
	public function Listcanbo($ma_canbo = NULL){
		// Lấy 1 bản ghi để sửa nếu không có $ma_canbo -> lấy toàn bộ bản ghi
		if(isset($ma_canbo)){
			$this->db->where('PK_sMaCB', $ma_canbo);
		}
		$this->db->select('*');
		return $this->db->get('tbl_canbo')->result_array();
	}
	public function layMaMoiNhat() {
	    $this->db->select("MAX(SUBSTRING(PK_sMaCB, 4)*1.0) AS max_id", FALSE);
	    $this->db->from($this->_table);
	    $query = $this->db->get();
	    if($query->num_rows() > 0) {
	        return $query->row_array();
	    }else{
	        return 0;
	    }
    }
	//Cập nhật lại môn
	public function CapNhatCB($ma_canbo, $data = array()) {
	// Kiểm tra dữ liệu nhập đã tồn tại trong CSDL hay chưa?
		$this->db->where('PK_sMaCB', $ma_canbo);
		$this->db->update($this->_table, $data);
		return $this->db->affected_rows();
	}


}

/* End of file mcanbo.php */
/* Location: ./application/models/canbo/mcanbo.php */