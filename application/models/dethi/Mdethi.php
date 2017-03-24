<?php
/**
* 
*/
class Mdethi extends CI_Model
{
	public function getAllDethi($id = null)
	{
		if(empty($id))
		{	
			$this->db->select('dt.*,monctdt.*,ctdt.*,tt.*');
			$this->db->from('tbl_dethi as dt');
			$this->db->join('tbl_trangthai as tt','tt.PK_iMaTT = dt.FK_iMaTT','inner');
			$this->db->join('tbl_monctdt as monctdt','monctdt.PK_iMaMonCTDT = dt.FK_iMaMonCTDT','inner');
			$this->db->join('tbl_ctdt as ctdt','ctdt.PK_iMaCTDT = monctdt.FK_iMaCTDT','inner');
			$this->db->order_by('FK_iMaTT,FK_iMaNganh,FK_iMaMon','asc');
			$q = $this->db->get()->result_array();
			return $q;
		}
		else{
			$this->db->where('dt.PK_sMaDT',$id);
			$this->db->select('dt.*,monctdt.*,ctdt.*,tt.*, nganh.sTenNganh,he.sTenHe,mon.sTenMon,dv.*');
			$this->db->from('tbl_dethi as dt');
			$this->db->join('tbl_trangthai as tt','tt.PK_iMaTT = dt.FK_iMaTT','inner');
			$this->db->join('tbl_monctdt as monctdt','monctdt.PK_iMaMonCTDT = dt.FK_iMaMonCTDT','inner');

			$this->db->join('tbl_mon as mon','monctdt.FK_iMaMon = mon.PK_iMaMon','inner');
			$this->db->join('tbl_ctdt as ctdt','ctdt.PK_iMaCTDT = monctdt.FK_iMaCTDT','inner');
			$this->db->join('tbl_nganh as nganh','nganh.PK_iMaNganh = ctdt.FK_iMaNganh','inner');
			$this->db->join('tbl_trinhdo as td','td.PK_iMaTrinhdo = ctdt.FK_iMaTrinhdo','inner');
			$this->db->join('tbl_he as he','he.PK_iMaHe = ctdt.FK_iMaHe','inner');
			$this->db->join('tbl_donvi as dv','dv.PK_iMaDonvi = ctdt.FK_iMaDonvi','inner');
			$q = $this->db->get()->result_array();
			return $q;
		}

	}
	public function getTrangthai()
	{
		return $this->db->get('tbl_trangthai')->result_array();
	}
	public function getNganh($idnganh = null)
	{
		if(!empty($idnganh))
			$this->db->where('PK_iMaNganh',$idnganh);
		return $this->db->get('tbl_nganh')->result_array();
	}
	public function getTrinhdo($idtrinhdo = null)
	{
		if(!empty($idtrinhdo))
			$this->db->where('PK_iMaTrinhdo',$idtrinhdo);
		return $this->db->get('tbl_trinhdo')->result_array();
	}
	public function getMon($idmon = null)
	{
		if(!empty($idmon))
			$this->db->where('PK_iMaMon',$idmon);
		return $this->db->get('tbl_mon')->result_array();
	}
	public function getHeDT($idhe = null)
	{
		if(!empty($idhe))
			$this->db->where('PK_iMaHe',$idhe);

		return $this->db->get('tbl_he')->result_array();
	}
	public function getDV($idDV = null)
	{
		if(!empty($idDV))
			$this->db->where('PK_iMaDonvi',$idDV);

		return $this->db->get('tbl_donvi')->result_array();
	}
	//lấy dữ liệu hệ đào tạo
	public function getEditHe()
	{
		$this->db->select('he.*');
		$this->db->from('tbl_ctdt as ctdt');
		$this->db->join('tbl_he as he','ctdt.FK_iMaHe = he.PK_iMaHe','inner');
		$this->db->group_by('he.PK_iMaHe');
		return $this->db->get()->result_array();
	}

	//ajax lấy dữ liệu ngành hệ năm môn để thêm đề thi
	public function getNganhbyID($idnganh,$idtrinhdo,$idhe,$idDV)
	{
		if(empty($idnganh) && empty($idtrinhdo) && empty($idhe) && !empty($idDV))
		{
			// echo json_encode($idDV); exit();
			$this->db->where('FK_iMaDonvi',$idDV);
			$this->db->select('tbl_he.*');
			$this->db->from('tbl_ctdt as ctdt');
			$this->db->join('tbl_he','tbl_he.PK_iMaHe = ctdt.FK_iMaHe','inner');
			$this->db->group_by('tbl_he.PK_iMaHe');
			return $this->db->get()->result_array();
			// return $this->db->get()->last_query();
		}
		else if(empty($idnganh) && empty($idtrinhdo) && !empty($idhe) && !empty($idDV)){
			// echo json_encode($idDV); exit();
			$this->db->where('FK_iMaDonvi',$idDV);
			$this->db->where('FK_iMaHe',$idhe);
			$this->db->select('nganh.*');
			$this->db->from('tbl_ctdt as ctdt');
			$this->db->join('tbl_nganh as nganh','nganh.PK_iMaNganh = ctdt.FK_iMaNganh','inner');
			$this->db->group_by('nganh.PK_iMaNganh');
			return $this->db->get()->result_array();
		}
		elseif (!empty($idnganh) && empty($idtrinhdo) && !empty($idhe) && !empty($idDV)) {
			$this->db->where('FK_iMaDonvi',$idDV);
			$this->db->where('FK_iMaHe',$idhe);
			$this->db->where('FK_iMaNganh',$idnganh);
			$this->db->select('td.*');
			$this->db->from('tbl_ctdt as ctdt');
			$this->db->join('tbl_trinhdo as td','td.PK_iMaTrinhdo = ctdt.FK_iMaTrinhdo','inner');
			$this->db->group_by('td.PK_iMaTrinhdo');
			return $this->db->get()->result_array();
		}
		else if(!empty($idnganh) && !empty($idhe) && !empty($idDV) && !empty($idtrinhdo))
		{
			$this->db->where('FK_iMaDonvi',$idDV);
			$this->db->where('FK_iMaHe',$idhe);
			$this->db->where('FK_iMaNganh',$idnganh);
			$this->db->where('FK_iMaTrinhdo',$idtrinhdo);
			$this->db->select('iNam');
			$this->db->from('tbl_ctdt');
			$this->db->group_by('iNam');
			return $this->db->get()->result_array();
		}
	}

	public function getMaCTDTbyID($idnganh,$idtrinhdo,$idhe,$nam,$idDV)
	{
		$this->db->where('FK_iMaDonvi',$idDV);
		$this->db->where('FK_iMaHe',$idhe);
		$this->db->where('FK_iMaNganh',$idnganh);
		$this->db->where('FK_iMaTrinhdo',$idtrinhdo);
		$this->db->where('iNam',$nam);
		$this->db->select('PK_iMaCTDT');
		$this->db->from('tbl_ctdt');
		return $this->db->get()->result_array();
	}
	public function getMonbyID($idctdt)
	{
		if(!empty($idctdt))
		{
			$this->db->where('FK_iMaCTDT',$idctdt);
			$this->db->select('mon.*');
			$this->db->from('tbl_monctdt as mctdt');
			$this->db->join('tbl_mon as mon','mctdt.FK_iMaMon = mon.PK_iMaMon','inner');
			$this->db->group_by('mon.PK_iMaMon');
			return $this->db->get()->result_array();
		}
	}
	public function getMonCTDTbyID($mactdt,$mon)
	{
		if(!empty($mactdt) && !empty($mon))
		{
			$this->db->where('FK_iMaCTDT',$mactdt);
			$this->db->where('FK_iMaMon',$mon);
			$this->db->select('PK_iMaMonCTDT');
			return $this->db->get('tbl_monctdt')->result_array();
		}
	}
	public function insertDeThi($arr3 = array())
	{
		if(!empty($arr3))
		{
			$this->db->insert('tbl_dethi',$arr3);
			return $this->db->affected_rows();
		}
	}

	public function updateDeThi($arr6 = array(), $id3)
	{
		if(!empty($arr6) && !empty($id3))
		{
			$this->db->where('PK_sMaDT',$id3);
			$this->db->update('tbl_dethi',$arr6);
			return $this->db->affected_rows();
		}
	}

	public function huyde($idde,$dt = array())
	{
		if(!empty($idde) && !empty($dt))
		{
			$this->db->where('PK_sMaDT',$idde);
			$this->db->update('tbl_dethi',$dt);
			return $this->db->affected_rows();
		}
	}
}
?>