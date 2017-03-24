<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhedaotao extends CI_Model {

	protected $_table       = "tbl_he";
    protected $_primary_key = "PK_iMaHe";

	/**
	* thêm dữ liệu
	*/
	
	public function themDuLieu($data=array())
	{
		$this->db->insert($this->_table,$data);
		return $this->db->affected_rows();
	}
	
	/**
	* cập nhật dữ liệu
	*/
	public function capnhatDuLieu($id,$data=array())
	{
		$this->db->where($this->_primary_key,$id);
		$this->db->update($this->_table,$data);
		return $this->db->affected_rows();
	}
	/**
	* lấy danh sách hoặc 1 dự liệu 
	*/
	public function layDuLieu($id=NULL)
	{
		if(!empty($id))
		{
			$this->db->where($this->_primary_key,$id);
		}
		return $this->db->get($this->_table)->result_array();
	}

}

/* End of file Mhedaotao.php */
/* Location: ./application/models/danhmuc/Mhedaotao.php */