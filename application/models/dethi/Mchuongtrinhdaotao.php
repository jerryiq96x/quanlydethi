<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mchuongtrinhdaotao extends CI_Model {

	protected $_table       = "tbl_ctdt";
    protected $_primary_key = "PK_iMaCTDT";

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
			return $this->db->get($this->_table)->result_array();
		}
		else{
			$this->db->select('ct.*,he.sTenHe,ng.sTenNganh,dv.sTenDonvi,td.sTentrinhdo');
			$this->db->from('tbl_ctdt as ct');
			$this->db->join('tbl_he as he','he.PK_iMaHe=ct.FK_iMaHe');
			$this->db->join('tbl_nganh as ng','ng.PK_iMaNganh=ct.FK_iMaNganh');
			$this->db->join('tbl_trinhdo as td','td.PK_iMaTrinhdo=ct.FK_iMaTrinhdo');
			$this->db->join('tbl_donvi as dv','dv.PK_iMaDonvi=ct.FK_iMaDonvi');
			$this->db->order_by('PK_iMaCTDT','desc');
			return $this->db->get()->result_array();
		}
	}
	/**
	* cập nhật môn chương trình đào tạo 
	*/
	public function  capnhatMonChuongTrinhDaoTao($data=array())
	{
		if(!empty($data))
		{
			$this->db->insert_batch('tbl_monctdt',$data);
			return $this->db->affected_rows();
		}
		else{
			return 0;
		}
	}
	/**
	*  Lấy danh sách môn học
	*/
	public function layDanhSachMonHoc($data=array())
	{
		if(!empty($data))
		{ 
			$this->db->where_not_in('PK_iMaMon',$data);
		}
		return $this->db->get('tbl_mon')->result_array();
	}
	/**
	*  lấy các mã môn theo mã chương trình đào tạo
	*/
	public function layMaMon($ma)
	{
		$this->db->where('FK_iMaCTDT',$ma);
		$this->db->select('PK_iMaMon,sTenMon,sSotinchi');
		$this->db->from('tbl_mon as m');
		$this->db->join('tbl_monctdt as ct','ct.FK_iMaMon=m.PK_iMaMon');
		$this->db->group_by('PK_iMaMon,sTenMon');
		return $this->db->get()->result_array();
	}
	/**
	* kiểm tra chương trình đào tạo 
	*/
	public function kiemtraCTDT($donvi,$nganh,$he,$nam)
	{
		$this->db->where('FK_iMaDonvi',$donvi);
		$this->db->where('FK_iMaNganh',$nganh);
		$this->db->where('FK_iMaHe',$he);
		$this->db->where('iNam',$nam);
		return $this->db->get('tbl_ctdt')->num_rows();
	}
	
	
}

/* End of file Mchuongtrinhdaotao.php */
/* Location: ./application/models/dethi/Mchuongtrinhdaotao.php */