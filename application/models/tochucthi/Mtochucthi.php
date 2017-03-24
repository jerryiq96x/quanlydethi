<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtochucthi extends CI_Model {

	/**
	 * @author:	Hải
	 * Time: 01/11/2016
	 * Description: tổ chức thi
	 */

	/**
	*  lấy môn chương trình đào tạo
	*/
	public function layMonChuongTrinhDaoTao($trangthai)
	{
		$this->db->where('FK_iMaTT',$trangthai);
		$this->db->select('PK_sMaDT,FK_iMaMonCTDT,sTenMon,sTenHe,sTenNganh,iNam');
		$this->db->from('tbl_dethi as dt');
		$this->db->join('tbl_monctdt as mdt','mdt.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
		$this->db->join('tbl_mon as m','m.PK_iMaMon=mdt.FK_iMaMon');
		$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mdt.FK_iMaCTDT');
		$this->db->join('tbl_he as h','h.PK_iMaHe=ct.FK_iMaHe');
		$this->db->join('tbl_nganh as n','n.PK_iMaNganh=ct.FK_iMaNganh');
		$this->db->group_by('FK_iMaMonCTDT,sTenMon,sTenHe,sTenNganh,iNam');
		return $this->db->get()->result_array();
	}
	/**
	*  đếm tổng số đề trong kho, và lấy các mã 
	*/
	public function demTongSoDe($mamondaotao)
	{
		$this->db->where('FK_iMaTT',1);
		$this->db->where('FK_iMaMonCTDT',$mamondaotao);
		$this->db->select('PK_sMaDT');
		return $this->db->get('tbl_dethi')->result_array();
	}
	/**
	* thêm tổ chức thi 
	*/
	public function themToChucThi($data=array())
	{
		$this->db->insert_batch('tbl_tochucthi',$data);
		return $this->db->affected_rows();
	}
	public function themGhichu($arr = array())
	{
		$this->db->insert('tbl_ghichu_ngaybocde',$arr);
		return $this->db->affected_rows();
	}
	/**
	*  lấy mã mới nhất
	*/
	public function layMaMoiNhat() 
	{
        $this->db->select("MAX(SUBSTRING(PK_sMaToChucThi, 5)*1.0) AS max_id", FALSE);
        $this->db->from('tbl_tochucthi');
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row_array();
        }else {
            return 0;
        }
    }
    public function getDSdeboc()
    {
    	$this->db->select('tct.FK_sNgayBoc,ghichu.sGhiChu');
    	$this->db->from('tbl_tochucthi as tct');
    	$this->db->join('tbl_ghichu_ngaybocde as ghichu','tct.FK_sNgayBoc = ghichu.PK_sNgayBoc','inner');
    	$this->db->group_by('FK_sNgayBoc');
    	$this->db->order_by('FK_sNgayBoc desc');
    	$q = $this->db->get()->result_array();
    	return $q;
    }
	public function getInfo($id)
	{
		$this->db->where('FK_sNgayBoc',$id);
		$this->db->select('tc.*,sTenNganh,sTenHe,iNam,sTenMon,sUpLoadDe,sUpLoadDA,sTenCB');
		$this->db->from('tbl_tochucthi as tc');
		$this->db->join('tbl_dethi as dt','dt.PK_sMaDT=tc.FK_sMaDT');
		$this->db->join('tbl_canbo as cb','cb.PK_sMaCB=tc.FK_sMaCB');
		$this->db->join('tbl_monctdt as mct','mct.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
		$this->db->join('tbl_mon as m','m.PK_iMaMon=mct.FK_iMaMon');
		$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mct.FK_iMaCTDT');
		$this->db->join('tbl_he as he','he.PK_iMaHe=ct.FK_iMaHe');
		$this->db->join('tbl_nganh as ng','ng.PK_iMaNganh=ct.FK_iMaNganh');
		$this->db->order_by('SUBSTRING(PK_sMaToChucThi, 5)*1.0 desc',null,false);
		$q = $this->db->get()->result_array();
		return $q;
	}
	/**
	*  lấy đề thi đã bốc
	*/
	// public function layDanhSachDeBoc($mamondaotao=NULL,$limit,$offset)
	// {
	// 	if(!empty($mamondaotao))
	// 	{
	// 		$this->db->where('dt.FK_iMaMonCTDT',$mamondaotao);
	// 	}
	// 	$this->db->select('tc.*,sTenNganh,sTenHe,iNam,sTenMon,sUpLoadDe,sUpLoadDA,sTenCB');
	// 	$this->db->from('tbl_tochucthi as tc');
	// 	$this->db->join('tbl_dethi as dt','dt.PK_sMaDT=tc.FK_sMaDT');
	// 	$this->db->join('tbl_canbo as cb','cb.PK_sMaCB=tc.FK_sMaCB');
	// 	$this->db->join('tbl_monctdt as mct','mct.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
	// 	$this->db->join('tbl_mon as m','m.PK_iMaMon=mct.FK_iMaMon');
	// 	$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mct.FK_iMaCTDT');
	// 	$this->db->join('tbl_he as he','he.PK_iMaHe=ct.FK_iMaHe');
	// 	$this->db->join('tbl_nganh as ng','ng.PK_iMaNganh=ct.FK_iMaNganh');
	// 	$this->db->order_by('SUBSTRING(PK_sMaToChucThi, 5)*1.0 desc',null,false);
	// 	$this->db->limit($limit,$offset);
	// 	return $this->db->get()->result_array();
	// }
	/**
	* đếm số đề đã bốc 
	*/
	public function demDeDaBoc($mamondaotao)
	{
		if(!empty($mamondaotao))
		{
			$this->db->where('dt.FK_iMaMonCTDT',$mamondaotao);
		}
		$this->db->select('tc.*,sTenNganh,sTenHe,iNam,sTenMon,sUpLoadDe,sUpLoadDA,sTenCB');
		$this->db->from('tbl_tochucthi as tc');
		$this->db->join('tbl_dethi as dt','dt.PK_sMaDT=tc.FK_sMaDT');
		$this->db->join('tbl_canbo as cb','cb.PK_sMaCB=tc.FK_sMaCB');
		$this->db->join('tbl_monctdt as mct','mct.PK_iMaMonCTDT=dt.FK_iMaMonCTDT');
		$this->db->join('tbl_mon as m','m.PK_iMaMon=mct.FK_iMaMon');
		$this->db->join('tbl_ctdt as ct','ct.PK_iMaCTDT=mct.FK_iMaCTDT');
		$this->db->join('tbl_he as he','he.PK_iMaHe=ct.FK_iMaHe');
		$this->db->join('tbl_nganh as ng','ng.PK_iMaNganh=ct.FK_iMaNganh');
		return $this->db->get()->num_rows();
	}
	
	

}

/* End of file Mtochucthi.php */
/* Location: ./application/models/tochucthi/Mtochucthi.php */