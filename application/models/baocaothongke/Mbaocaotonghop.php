<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbaocaotonghop extends CI_Model {

	/**
	*  lấy tổng môn của các đơn vị
	*/
	
	public function layMaMonCTDT($batdau,$ketthuc)
	{
		$this->db->where('sThoiGian >=',$batdau);
		$this->db->where('sThoiGian <=',$ketthuc);
		// $this->db->where('FK_iMaTT',1);
		$this->db->select('FK_iMaMonCTDT');
		$this->db->group_by('FK_iMaMonCTDT');
		return $this->db->get('tbl_dethi')->result_array();
	}

	/**
	* lấy số môn có đề chưa dùng của các đơn vị 
	*/
	public function layMonChuaDung($ma)
	{
		$this->db->where_in('PK_iMaMonCTDT',$ma);
		$this->db->select('FK_iMaDonvi,count(FK_iMaMon) as tongmon');
		$this->db->from('tbl_monctdt as mdt');
		$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mdt.FK_iMaCTDT');
		$this->db->group_by('FK_iMaDonvi');
		return $this->db->get()->result_array();
	}
	
	/**
	* lấy số đề chưa dùng của các đơn vị 
	*/
	public function laySoDeChuaDung($batdau,$ketthuc)
	{
		$this->db->where('sThoiGian >=',$batdau);
		$this->db->where('sThoiGian <=',$ketthuc);
		// $this->db->where('FK_iMaTT',1);
		$this->db->select('FK_iMaDonvi,count(PK_sMaDT) as tongde');
		$this->db->from('tbl_dethi as det');
		$this->db->join('tbl_monctdt as mdt','mdt.PK_iMaMonCTDT=det.FK_iMaMonCTDT');
		$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mdt.FK_iMaCTDT');
		$this->db->group_by('FK_iMaDonvi');
		return $this->db->get()->result_array();
	}

}

/* End of file Mbaocaotonghop.php */
/* Location: ./application/models/baocaothongke/Mbaocaotonghop.php */