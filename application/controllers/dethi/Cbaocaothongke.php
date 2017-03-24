<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbaocaothongke extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dethi/Mbaocaothongke');
		$this->load->model('dethi/Mdethi');
	}
	public function index()
	{
		$data['title']    = 'Báo cáo thống kê';

		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['he'] = $this->Mdethi->getHeDT();
		// pr($data['he']);
		// pr($idhe);
		$action = $this->input->post('action');
		switch ($action) {
			case 'getNganh':
					$this->getNganhbyID();
				break;
			case 'getNam':
					$this->getNambyID();
				break;
			case 'getMon':
					$this->getMonbyID();
				break;
			case 'getMonCTDT':
					$this->getMonCTDTbyID();
				break;
			default:
				# code...
				break;
		}
		$data['thongke']   ='';
		$data['listHe']    = $this->Mdethi->getHeDT(NULL);
		$data['listNganh'] ='';
		$data['listNam']   ='';
		$data['listMon']   ='';
		$data['listHe2']  ='';
		if($this->input->get('submit'))
		{
			$idhe              = $this->input->get('txtHe');
			$idnganh           = $this->input->get('txtNganh');
			$nam               = $this->input->get('txtNam');
			$idmon             = $this->input->get('txtMon');
			$data['listHe2']    = $this->Mdethi->getHeDT($idhe);
			$data['listNganh'] = $this->Mdethi->getNganh($idnganh);
			$data['listNam']   = $nam;
			$data['listMon']   = $this->Mdethi->getMon($idmon);

			$kq        = $this->Mdethi->getMaCTDTbyID($idnganh,$idhe,$nam);
			$mamonctdt = $this->Mdethi->getMonCTDTbyID($kq[0]['PK_iMaCTDT'],$idmon);
			$data['mamonctdt'] = $mamonctdt;
			$thongke = $this->Mbaocaothongke->thongke($mamonctdt);
			$mang=array();
			foreach ($thongke as $key => $val) {
				$mang[$val['PK_iMaTT']]=$val['tong'];
			}
			$trangthai=$this->Mbaocaothongke->layTrangThai();
			foreach ($trangthai as $key => $value) {
				if(!empty($mang[$value['PK_iMaTT']]))
				{
					$trangthai[$key]['tong']=$mang[$value['PK_iMaTT']];
				}
				else{
					$trangthai[$key]['tong']=0;
				}
			}
		$data['thongke']=$trangthai;
		}
		$temp['data']     = $data;
		$temp['template'] = 'dethi/Vbaocaothongke';
		$this->load->view('layout/layout',$temp);
	}
	public function getNganhbyID()
    {
    	$idhe = $this->input->post('IDHe');
    	if(!empty($idhe))
    	{
    		$kq = $this->Mdethi->getNganhbyID($idhe);
    		echo json_encode($kq);
    		exit();
    	}
    }
    public function getNambyID()
    {
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	if(!empty($idhe) && !empty($idnganh))
    	{
    		$kq = $this->Mdethi->getNganhbyID($idhe,$idnganh);
    		echo json_encode($kq);
    		exit();
    	}
    }
    public function getMonbyID()
    {
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	$nam = $this->input->post('Nam');
    	if(!empty($idnganh) && !empty($idhe) && !empty($nam))
    	{
    		$kq = $this->Mdethi->getMaCTDTbyID($idnganh,$idhe,$nam);
    		if(!empty($kq))
	    	{	
	    		$kq2 = $this->Mdethi->getMonbyID($kq[0]['PK_iMaCTDT']);
	    		echo json_encode($kq2);
	    		exit();
	    	}
	    	else{
	    		$kq2 = 'error';
	    		echo json_encode($kq2);
	    		exit();
	    	}
    	}
    }
    public function getMonCTDTbyID()
    {
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	$nam = $this->input->post('Nam');
    	$mon = $this->input->post('Mon');
    	if(!empty($idnganh) && !empty($idhe) && !empty($nam) && !empty($mon))
    	{
    		$kq = $this->Mdethi->getMaCTDTbyID($idnganh,$idhe,$nam);
    		$kq2 = $this->Mdethi->getMonCTDTbyID($kq[0]['PK_iMaCTDT'],$mon);
    		echo json_encode($kq2);
    		exit();
    	}
    }
}

/* End of file Cbaocaothongke.php */
/* Location: ./application/controllers/dethi/Cbaocaothongke.php */