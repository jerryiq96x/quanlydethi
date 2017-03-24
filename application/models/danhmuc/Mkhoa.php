<?php
/**
* 
*/
class Mkhoa extends CI_Model
{
	
	public function getAll()
	{
		return $this->db->get('tbl_donvi')->result_array();
	}

	public function getByID($id)
	{
		if(!empty($id))
		{
			$this->db->where('PK_iMaDonvi',$id);
			return $this->db->get('tbl_donvi')->result_array();
		}
	}
	public function insertKhoa($data = array()){
		// Kiểm tra môn đã tồn tại chưa
		$this->db->insert('tbl_donvi',$data);
		return $this->db->affected_rows();
	}

	public function updateKhoa($id, $data = array()) {
	// Kiểm tra dữ liệu nhập đã tồn tại trong CSDL hay chưa?
		$this->db->where('PK_iMaDonvi', $id);
		$this->db->update('tbl_donvi', $data);
		return $this->db->affected_rows();
	}
}
?>