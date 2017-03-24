<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdethi extends MY_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('dethi/Mdethi');
	}
	public function index()
	{
		$data['title']='Cập nhật đề thi';
		$data['bt_name'] = 'themde';
		$data['bt_val'] = 'themde';
		$data['bt_text'] = 'Thêm đề thi';
		$data['bt_icon'] = 'plus';
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$idCB = $this->_session['PK_sMaCB'];
		$idDe = $this->input->get('id');
		$action = $this->input->post('action');
		switch ($action) {
			case 'getHe':
					$this->getHebyID();
				break;
			case 'getNganh':
					$this->getNganhbyID();
				break;
			case 'getTrinhdo':
					$this->getTrinhdobyID();
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
		
		if($this->input->post('themde'))
		{
			$this->do_upload($idCB,$idDe);
		}
		if(!empty($idDe))
		{
			$data['kt'] = 'co';
			$data['check'] = 'co';
			$data['bt_val'] = 'suade';
			$data['bt_text'] = 'Sửa đề thi';
			$data['bt_icon'] = 'saved';
			$data['dataDe'] = $this->Mdethi->getAllDethi($idDe);
			// pr($data['dataDe']);
			$data['dtHe'] = $this->Mdethi->getEditHe();
			
		}
		
		$data['listDV'] = $this->Mdethi->getDV();
		$data['message'] = getMessages();
		$temp['data']       = $data;
		$temp['template']   = 'dethi/Vdethi';
		$this->load->view('layout/layout', $temp);
	}
	public function do_upload($idCB,$idDe)
    {
    	$this->load->library('upload');
		$config['file_name']	 = clean($_FILES['filedethi']['name']);
    	$config['overwrite']     = true;
		$config['upload_path']   = './file/';
		$config['allowed_types'] = '*';
		$this->upload->initialize($config);
		$this->upload->do_upload('filedethi');

		$config['file_name']	 = clean($_FILES['filedapan']['name']);
    	$config['overwrite']     = true;
		$config['upload_path']   = './file/';
		$config['allowed_types'] = '*';
		$this->upload->initialize($config);
		$this->upload->do_upload('filedapan');
      		//thêm đề
      		if(empty($idDe))
	      	{	
	      		if ($this->upload->do_upload('filedethi')||$this->upload->do_upload('filedapan'))
		    		{
				    	$arr3 = array(
				    		'PK_sMaDT'			=> ($this->input->post('txtHe')).($this->input->post('hidden_rd')),
				    		'FK_iMaMonCTDT'		=> $this->input->post('txtMaMonCTDT'),
				    		'sMaKhoaPhu'		=> $this->input->post('txtKhoaphu'),
				    		'FK_iMaTT'			=> 1,
				    		'FK_sMaCB'			=> $idCB,
				    		'sUpLoadDe'			=> clean($_FILES['filedethi']['name']),
				    		'sUpLoadDA'			=> clean($_FILES['filedapan']['name']),
				    		'sThoiGian'			=> unix_time(date('d/m/Y',time()))
				    	);
				    	$rs3 = $this->Mdethi->insertDeThi($arr3);
		    			setMessages("success", "", "Tải lên đề thi thành công!");
		    			redirect(base_url().'dsdethi');
		    		}
		    	else{
		     		setMessages("error", "", "Tải lên đề thi thất bại!");
		     	}
			}
			else{
					if($this->input->post('txtMaMonCTDT')!="")
					{
						if(clean($_FILES['filedethi']['name'])!="")
							$arr3 = array(
					    		'FK_iMaMonCTDT'		=> $this->input->post('txtMaMonCTDT'),
					    		'sMaKhoaPhu'		=> $this->input->post('txtKhoaphu'),
					    		'sUpLoadDe'			=> clean($_FILES['filedethi']['name']),
					    		'sUpLoadDA'			=> clean($_FILES['filedapan']['name']),
					    		'sThoiGian'			=> unix_time(date('d/m/Y',time()))
					    	);
						else{
							$arr3 = array(
					    		'FK_iMaMonCTDT'		=> $this->input->post('txtMaMonCTDT'),
					    		'sMaKhoaPhu'		=> $this->input->post('txtKhoaphu'),
					    		'sUpLoadDA'			=> clean($_FILES['filedapan']['name']),
					    		'sThoiGian'			=> unix_time(date('d/m/Y',time()))
					    	);
						}
						$rs3 = $this->Mdethi->updateDeThi($arr3,$idDe);
					}
					else{
						if(clean($_FILES['filedethi']['name'])!="")
							$arr3 = array(
					    		'sMaKhoaPhu'		=> $this->input->post('txtKhoaphu'),
					    		'sUpLoadDe'			=> clean($_FILES['filedethi']['name']),
					    		'sUpLoadDA'			=> clean($_FILES['filedapan']['name']),
					    		'sThoiGian'			=> unix_time(date('d/m/Y',time()))
					    	);
						else{
							$arr3 = array(
					    		'sMaKhoaPhu'		=> $this->input->post('txtKhoaphu'),
					    		'sUpLoadDA'			=> clean($_FILES['filedapan']['name']),
					    		'sThoiGian'			=> unix_time(date('d/m/Y',time()))
					    	);
						}
						$rs3 = $this->Mdethi->updateDeThi($arr3,$idDe);
					}
			    	// echo "<br>rs3= ".$rs3; exit();	
			    	if($rs3 > 0)
			    	{
			    		setMessages("success", "", "Sửa đề thi thành công!");
    					redirect(base_url().'dsdethi');
			    	}
			    	else
			    		setMessages("erorr", "", "Sửa đề thi thất bại!-1");
				}
	}
	public function getHebyID()
	{
		$idDV = $this->input->post('IDdonvi');
		if(!empty($idDV))
		{
			// echo json_encode($idDV); exit();
			$kq = $this->Mdethi->getNganhbyID(null,null,null,$idDV);
    		echo json_encode($kq);
    		exit();
		}
	}
    public function getNganhbyID()
    {
    	$idDV = $this->input->post('IDdonvi');
    	$idhe = $this->input->post('IDHe');
    	if(!empty($idhe) && !empty($idDV))
    	{
    		$kq = $this->Mdethi->getNganhbyID(null,null,$idhe,$idDV);
    		echo json_encode($kq);
    		exit();
    	}
    }
    public function getTrinhdobyID()
    {
    	$idDV = $this->input->post('IDdonvi');
    	$idhe = $this->input->post('IDHe');
    	$idnganh = $this->input->post('IDnganh');
    	if(!empty($idDV) && !empty($idhe) && !empty($idnganh))
    	{
    		$kq = $this->Mdethi->getNganhbyID($idnganh,null,$idhe,$idDV);
    		echo json_encode($kq);
    		exit();
    	}
    }
    public function getNambyID()
    {
    	$idDV = $this->input->post('IDdonvi');
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	$idtrinhdo = $this->input->post('IDtrinhdo');
    	if(!empty($idhe) && !empty($idnganh) && !empty($idDV))
    	{
    		$kq = $this->Mdethi->getNganhbyID($idnganh,$idtrinhdo,$idhe,$idDV);
    		echo json_encode($kq);
    		exit();
    	}
    }
    public function getMonbyID()
    {
    	$idDV = $this->input->post('IDdonvi');
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	$idtrinhdo = $this->input->post('IDtrinhdo');
    	$nam = $this->input->post('Nam');
    	if(!empty($idnganh) && !empty($idhe) && !empty($nam) && !empty($idDV))
    	{
    		$kq = $this->Mdethi->getMaCTDTbyID($idnganh,$idtrinhdo,$idhe,$nam,$idDV);
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
    	$idDV = $this->input->post('IDdonvi');
    	$idnganh = $this->input->post('IDnganh');
    	$idhe = $this->input->post('IDHe');
    	$nam = $this->input->post('Nam');
    	$idtrinhdo = $this->input->post('IDtrinhdo');
    	$mon = $this->input->post('Mon');
    	if(!empty($idnganh) && !empty($idhe) && !empty($nam) && !empty($mon))
    	{
    		$kq = $this->Mdethi->getMaCTDTbyID($idnganh,$idtrinhdo,$idhe,$nam,$idDV);
    		$kq2 = $this->Mdethi->getMonCTDTbyID($kq[0]['PK_iMaCTDT'],$mon);
    		echo json_encode($kq2);
    		exit();
    	}
    }
}

/* End of file Cdethi.php */
/* Location: ./application/controllers/dethi/Cdethi.php */