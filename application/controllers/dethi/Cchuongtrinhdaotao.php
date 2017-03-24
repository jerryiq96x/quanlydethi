<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cchuongtrinhdaotao extends MY_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('dethi/Mchuongtrinhdaotao');
	}
	public function index()
	{	
		$data['title']       = 'Chương trình đào tạo';
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		($this->input->post('ma'))? $this->capnhatChuongTrinhDaoTao() : $this->themChuongTrinhDaoTao();
		// $data['content']     = $ketqua;
		$data['dsctdt']      = $this->Mchuongtrinhdaotao->layDuLieu(NULL);
		$action=$this->input->post('action');
		if(!empty($action))
		{
			switch ($action) {
				case 'dodulieu':
					$this->doDuLieu();
					break;
				case 'dodulieumonhoc':
					$this->doDuLieuMonHoc();
					break;
				case 'themmonchuongtrinhdaotao':
					$this->themMonChuongTrinhDaoTao();
					break;
				case 'kiemtrachuongtrinhdaotao':
					$this->kiemtraCTDT();
					break;
				default:
					# code...
					break;
			}
		}
		$data['hedaotao']    = $this->layDuLieu(NULL,NULL,'tbl_he');
		$data['nganhdaotao'] = $this->layDuLieu(NULL,NULL,'tbl_nganh');
		$data['monhoc']		 = $this->layDuLieu(NULL,NULL,'tbl_mon');
		$data['donvi']		 = $this->layDuLieu(NULL,NULL,'tbl_donvi');
		$data['trinhdo']	 = $this->layDuLieu(NULL,NULL,'tbl_trinhdo');
		// pr($data);
		$data['tongmon']	 = sizeof($data['monhoc']);
		$data['message'] = getMessages();
		$temp['data']        = $data;
		$temp['template']= 'dethi/Vchuongtrinhdaotao';
		$this->load->view('layout/layout',$temp);
	}
	public function kiemtraCTDT()
	{
		$donvi =$this->input->post('donvi');
		$nganh =$this->input->post('nganh');
		$he    =$this->input->post('he');
		$nam   =$this->input->post('nam');
		$ma    =$this->input->post('ma');
		if(!empty($ma))
		{
			$thongtin =  $this->Mchuongtrinhdaotao->layDuLieu($ma);
			if($thongtin[0]['FK_iMaDonvi']==$donvi && $thongtin[0]['FK_iMaNganh']==$nganh && $thongtin[0]['FK_iMaHe']==$he && $thongtin[0]['iNam']==$nam )
			{
				$data=0;
			}
			else{
		        $data = $this->Mchuongtrinhdaotao->kiemtraCTDT($donvi,$nganh,$he,$nam);
			}
		}
		else{
	        $data = $this->Mchuongtrinhdaotao->kiemtraCTDT($donvi,$nganh,$he,$nam);
		}
		echo json_encode($data); exit();

	}
	public function themChuongTrinhDaoTao()
	{
		if($this->input->post('capnhat'))
		{
			$data=array(
				'FK_iMaDonvi'    => $this->input->post('donvi'),
				'FK_iMaNganh' => $this->input->post('nganh'),
				'FK_iMaHe'    => $this->input->post('he'),
				'FK_iMaTrinhdo' => $this->input->post('trinhdo'),
				'iNam'        => $this->input->post('nam')
				);
			$kiemtra=$this->Mchuongtrinhdaotao->themDuLieu($data);
			if($kiemtra>0)
			{
				setMessages("success", "", "Thêm chương trình đào tạo thành công!");
			}
			else{
				setMessages("error", "", "Thêm chương trình đào tạo thất bại!");
			}
		}
	}
	public function capnhatChuongTrinhDaoTao()
	{
		if($this->input->post('capnhat'))
		{
			$ma=$this->input->post('ma');
			$data=array(
				'FK_iMaDonvi'    => $this->input->post('donvi'),
				'FK_iMaNganh' => $this->input->post('nganh'),
				'FK_iMaHe'    => $this->input->post('he'),
				'FK_iMaTrinhdo' => $this->input->post('trinhdo'),
				'iNam'        => $this->input->post('nam')
				);
			$kiemtra=$this->Mchuongtrinhdaotao->capnhatDuLieu($ma,$data);
			if($kiemtra>0)
			{
				setMessages("success", "", "Sửa chương trình đào tạo thành công!");
			}
			else{
				setMessages("error", "", "Sửa chương trình đào tạo thất bại!");
			}
		}
	}
	public function doDuLieu()
	{
		$ma=$this->input->post('ma');
		$data=$this->Mchuongtrinhdaotao->layDuLieu($ma);
		echo json_encode($data); exit();
	}
	public function themMonChuongTrinhDaoTao()
	{
		$ma=$this->input->post('ma');
		$dsmon=$this->input->post('dsmon');
		$data=array();
		if(!empty($dsmon)){
			foreach ($dsmon as $key => $val) {
				$data[$key]['FK_iMaCTDT']=$ma;
				$data[$key]['FK_iMaMon']=$val;
			}
		}
		$kiemtra=$this->Mchuongtrinhdaotao->capnhatMonChuongTrinhDaoTao($data);
		echo json_encode($kiemtra); exit();
	}
	public function doDuLieuMonHoc()
	{
		$ma=$this->input->post('ma');
		$dsmon=$this->Mchuongtrinhdaotao->layMaMon($ma);
		foreach ($dsmon as $key => $value) {
			$dsmon[$key]=$value['PK_iMaMon'];
		}
		$dsmondaxep=$this->Mchuongtrinhdaotao->layMaMon($ma);
		foreach ($dsmondaxep as $key => $value) {
			$dsmondaxep[$key]['PK_iMaMon']=0;
			$dsmondaxep[$key]['sTenMon']=$value['sTenMon'];
			$dsmondaxep[$key]['sSotinchi']=$value['sSotinchi'];
		}
		$dsmonchuaxep=$this->Mchuongtrinhdaotao->layDanhSachMonHoc($dsmon);
		$data=array_merge($dsmonchuaxep,$dsmondaxep);
		echo json_encode($data); exit();
	}

}

/* End of file Cchuongtrinhdaotao.php */
/* Location: ./application/controllers/dethi/Cchuongtrinhdaotao.php */