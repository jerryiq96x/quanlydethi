<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdangnhap extends CI_Model {

	public function kiemtraDangNhap($taikhoan,$matkhau)
	{
		$this->db->where('sTaiKhoan',$taikhoan);
		$this->db->where('sMatKhau',$matkhau);
		$this->db->select('cb.*,sTenQuyen');
		$this->db->from('tbl_canbo as cb');
		$this->db->join('tbl_quyen as q','q.PK_iMaQuyen=cb.FK_iMaQuyen');
		return $this->db->get()->row_array();
	}
	public function checkLink($maquyen,$chucnang)
	{

		
		// print_r($chucnang);
		// pr($maquyen);
		$this->db->where('cn.sRoute',$chucnang);
		$this->db->where('PK_iMaQuyen',$maquyen);
		$this->db->select('c_q.*,cn.*');
		$this->db->from('tbl_chucnang_quyen as c_q');
		$this->db->join('dm_chucnang as cn','c_q.PK_iMaChucnang = cn.PK_iMaChucnang','inner');
		$q = $this->db->get()->result_array();
		// pr($q);
		// echo $this->db->last_query();
		return $q;
	}
}

/* End of file Mdangnhap.php */
/* Location: ./application/models/Mdangnhap.php */