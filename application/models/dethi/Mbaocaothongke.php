<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbaocaothongke extends CI_Model {

	/**
	*  lấy ra các trạng thái
	*/
	
	public function layTrangThai()
	{
		return $this->db->get('tbl_trangthai')->result_array();
	}
	public function thongke($mamonctdt)
	{
		$this->db->where('FK_iMaMonCTDT',$mamonctdt[0]['PK_iMaMonCTDT']);
		$this->db->select('PK_iMaTT,sTenTT,count(FK_iMaTT) as tong');
		$this->db->from('tbl_trangthai as tt');
		$this->db->join('tbl_dethi as dt','dt.FK_iMaTT=tt.PK_iMaTT');
		$this->db->group_by('sTenTT,FK_iMaTT');
		return $this->db->get()->result_array();
	}

	/**
	*  chi tiết của từng trạng thái môn ctdt
	*/
	public function chitietthongke($trangthai,$mamonctdt)
	{
		$this->db->where('FK_iMaTT',$trangthai);
		$this->db->where('FK_iMaMonCTDT',$mamonctdt);
		$this->db->select('sTenCB,sThoiGian');
		$this->db->from('tbl_dethi as dt');
		$this->db->join('tbl_canbo as cb','cb.PK_sMaCB=dt.FK_sMaCB');
		return $this->db->get()->result_array();
	}
	

}

/* End of file Mbaocaothongke.php */
/* Location: ./application/models/dethi/Mbaocaothongke.php */