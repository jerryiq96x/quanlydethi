<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdoimatkhau extends CI_Model {

	public function checkpass($idCB,$old)
	{
		$this->db->where('PK_sMaCB',$idCB);
		$this->db->where('sMatKhau',$old);
		$q = $this->db->get('tbl_canbo')->result_array();
		return $q;
	}
	public function changePass($idCB,$arr)
	{
		$this->db->where('PK_sMaCB',$idCB);
		$this->db->update('tbl_canbo',$arr);
		return $this->db->affected_rows();
	}
}

/* End of file Mdoimatkhau.php */
/* Location: ./application/models/canbo/Mdoimatkhau.php */