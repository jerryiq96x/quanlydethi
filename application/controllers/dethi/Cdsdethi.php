<?php
/**
* 
*/
class Cdsdethi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('dethi/Mdethi');
	}

	public function index()
	{
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		
		$data['title'] = 'Danh sách đề thi';
		$used = '';
		if($this->input->post('huydechuadung'))
		{
			$used = 'yes';
			$idDe = $this->input->post('huydechuadung');
			$this->huyde($idDe,$used);
		}
		else if($this->input->post('huydedadung'))
		{
			$used = 'no';
			$idDe = $this->input->post('huydedadung');
			// pr($used);
			$this->huyde($idDe,$used);
		}
		if($this->input->post('recoverchuadung'))
		{
			$used = 'yes';
			// pr($used);
			$idDe = $this->input->post('recoverchuadung');
			$this->recovery($idDe,$used);
		}
		else if($this->input->post('recoverdadung'))
		{
			$used = 'no';
			$idDe = $this->input->post('recoverdadung');
			$this->recovery($idDe,$used);
		}
		// print_r($data['listDethi']); exit();
		$data['message'] = getMessages();
		$data['listTT'] = $this->Mdethi->getTrangthai();
		$data['listNganh'] = $this->Mdethi->getNganh();
		$data['listMon'] = $this->Mdethi->getMon();
		$data['listHe'] = $this->Mdethi->getHeDT();
		$data['listDethi']  = $this->Mdethi->getAllDethi();
		// pr($data['listDethi']);
		$temp['data']       = $data;
		$temp['template']   = 'dethi/Vdsdethi';
		$this->load->view('layout/layout', $temp);
	}

	public function huyde($idDe,$used)
	{
		if(!empty($idDe) && !empty($used))
		{
			if($used == 'yes')
			{	
				$dt = array(
					'FK_iMaTT' => '3'
				);
			}
			else{
				$dt = array(
					'FK_iMaTT' => '4'
				);
			}
		$rs = $this->Mdethi->huyde($idDe,$dt);

			if($rs>0)
			{
				setMessages("success", "", "Hủy đề thi thành công!");
				redirect(base_url().'dsdethi');
			}
			else{
				setMessages("error", "", "Có lỗi trong quá trình hủy. Vui lòng thử lại sau!");
			}
		}
	}
	public function recovery($idDe,$used)
	{
		if(!empty($idDe) && !empty($used))
		{
			// pr($used);
			if($used == 'yes')
			{	
				$dt = array(
					'FK_iMaTT' => '1'
				);
			}
			else{
				$dt = array(
					'FK_iMaTT' => '2'
				);
			}
			$rs = $this->Mdethi->huyde($idDe,$dt);

			if($rs>0)
			{
				setMessages("success", "", "Khôi phục đề thi thành công!");
				redirect(base_url().'dsdethi');
			}
			else{
				setMessages("error", "", "Có lỗi trong quá trình khôi phục. Vui lòng thử lại sau!");
			}
		}
	}
}
?>