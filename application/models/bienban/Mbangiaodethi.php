<?php
/**
* 
*/
class Mbangiaodethi extends CI_Model
{
	public function getDonvi($dv = null)
	{
		if($dv != null)
		{
			$this->db->where('PK_iMaDonvi',$dv);
		}
		return $this->db->get('tbl_donvi')->result_array();
	}
	public function getHeDT($id)
	{
		$this->db->where('FK_iMaDonvi',$id);
		$this->db->select('he.sTenHe');
		$this->db->from('tbl_ctdt as ctdt');
		$this->db->join('tbl_he as he','ctdt.FK_iMaHe = he.PK_iMaHe','inner');
		$this->db->group_by('he.sTenHe');
		$q = $this->db->get()->result_array();
		return $q;
	}
	public function getMon($tct=null,$tenhe=null,$dv=null)
	{
		if($tenhe != null)
		{
			$this->db->where('sTenHe',$tenhe);
			$this->db->where('FK_iMaDonvi',$dv);
		}
		else
			$this->db->where_in('PK_sMaToChucThi',$tct);
		$this->db->select('tct.sPhongThi,tct.PK_sMaToChucThi,tct.sSoLuong,mon.sTenMon,dt.PK_sMaDT');
		$this->db->from('tbl_tochucthi as tct');
		$this->db->join('tbl_dethi as dt','tct.FK_sMaDT = dt.PK_sMaDT','inner');//nối đề thi với tổ chức thi
		$this->db->join('tbl_monctdt as monctdt','dt.FK_iMaMonCTDT = monctdt.PK_iMaMonCTDT','inner');//nối môn ctdt với đề thi
		$this->db->join('tbl_mon as mon','mon.PK_iMaMon = monctdt.FK_iMaMon','inner');//nối môn với môn ctdt
		$this->db->join('tbl_ctdt as ctdt','ctdt.PK_iMaCTDT = monctdt.FK_iMaCTDT','inner');//nối môn ctdt với ctdt
		$this->db->join('tbl_donvi as dv','dv.PK_iMaDonvi = ctdt.FK_iMaDonvi','inner');
		$this->db->join('tbl_he as he','he.PK_iMaHe = ctdt.FK_iMaHe','inner');
		$q = $this->db->get()->result_array();
		return $q;
	}

	public function insertBienban($arr = array())
	{
		$this->db->insert('tbl_bienbangiaodethi',$arr);
		return $this->db->affected_rows();
	}
	public function insertBienban_TCT($data = array())
	{
		$this->db->insert_batch('tbl_tct_bienban',$data);
		return $this->db->affected_rows();
	}
}
?>