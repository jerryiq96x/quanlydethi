<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msoluongdedonvi extends CI_Model {

	/**
	* lấy danh sách môn hệ của đơn vị 
	*/
	public function layMonHeDonVi($madonvi)
	{
		$this->db->where('FK_iMaDonvi',$madonvi);
		$this->db->select('PK_iMaMon,sTenMon,sTenHe,PK_iMaHe,PK_iMaMonCTDT');
		$this->db->from('tbl_ctdt as ctdt');
		$this->db->join('tbl_he as h','h.PK_iMaHe=ctdt.FK_iMaHe');
		$this->db->join('tbl_monctdt as mdt','mdt.FK_iMaCTDT=ctdt.PK_iMaCTDT');
		$this->db->join('tbl_mon as m','m.PK_iMaMon=mdt.FK_iMaMon');
		$this->db->order_by('sTenMon','asc');
		$this->db->group_by('PK_iMaMon,sTenMon,sTenHe,PK_iMaHe');
		return $this->db->get()->result_array();
	}
	
	/**
	* thống kê số lượng
	*/
	public function thongke($mamon,$he,$donvi)
	{
		$this->db->where('FK_iMaDonvi',$donvi);
		$this->db->where('FK_iMaMon',$mamon);
		$this->db->where('FK_iMaHe',$he);
		$this->db->select('PK_iMaTT,sTenTT,count(FK_iMaTT) as tong');
		$this->db->from('tbl_trangthai as tt');
		$this->db->join('tbl_dethi as dt','dt.FK_iMaTT=tt.PK_iMaTT');
		$this->db->join('tbl_monctdt as mdt','mdt.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
		$this->db->join('tbl_ctdt as ctdt','ctdt.PK_iMaCTDT=mdt.FK_iMaCTDT');
		$this->db->group_by('sTenTT,FK_iMaTT');
		return $this->db->get()->result_array();
	}
	public function getDethi($donvi)
	{
		// $this->db->select('PK_sMaDT,FK_iMaTT');
		// $q = $this->db->get('tbl_dethi')->result_array();
		// return $q;
		$this->db->where('FK_iMaDonvi',$donvi);
		$this->db->select('PK_sMaDT,FK_iMaTT');
		$this->db->from('tbl_dethi as dt');
		// $this->db->where('FK_iMaMon',$mamon);
		// $this->db->where('FK_iMaHe',$he);
		
		$this->db->join('tbl_monctdt as mdt','mdt.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
		$this->db->join('tbl_ctdt as ctdt','ctdt.PK_iMaCTDT=mdt.FK_iMaCTDT');
		return $this->db->get()->result_array();
	}
	
	

}

/* End of file Msoluongdedonvi.php */
/* Location: ./application/models/baocaothongke/Msoluongdedonvi.php */