<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctochucthi extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('tochucthi/Mtochucthi');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['title']          = 'Tổ chức thi';
		$data['diadiem']        = $this->layDuLieu(NULL,NULL,'tbl_diadiemthi');
		$data['mondaotao']      = $this->Mtochucthi->layMonChuongTrinhDaoTao(1);
		
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$action=$this->input->post('action');
		if(!empty($action))
		{
			switch ($action) {
				case 'densode':
					$this->demTongSoDe();
					break;
				case 'bocde':
					$this->BocDe();
					break;
				case 'getInfo':
					$this->getInfo();
					break;
				default:
					# code...
					break;
			}
		}
		if($this->input->post('luutochucthi'))
		{
			$ketqua=$this->themToChucThi();
			$data['content'] = $ketqua;
		}
		// $x = date('d/m/Y',1482978180);
		// pr($x);
		// $data['dsdeboc']   = $this->Mtochucthi->layDanhSachDeBoc();
		// $bocde               = $this->DanhSachDeDaBoc();
		// $data['dsdeboc']     = $bocde['info'];
		// $data['phantrang']   = $bocde['pagination'];
		// $data['mamondaotao'] = $bocde['mamondaotao'];
		// $d = date('d/m/Y H:i',time());
		// pr($d);
		$data['dsdeboc'] = $this->Mtochucthi->getDSdeboc();
		// pr(date('d/m/Y H:i',$data['dsdeboc'][0]['FK_sNgayBoc']));
		$data['message'] = getMessages();
		$temp['data']      = $data;
		$temp['template']  = 'tochucthi/Vtochucthi';
		$this->load->view('layout/layout',$temp);
	}
	public function demTongSoDe()
	{
		$mamondaotao =$this->input->post('mamondaotao');
		$data        =$this->Mtochucthi->demTongSoDe($mamondaotao);
		echo json_encode(sizeof($data)); exit();
	}
	public function BocDe()
	{
		$mamondaotao =$this->input->post('mamondaotao');
		$sodeboc     =$this->input->post('sodeboc');
		$data        =$this->Mtochucthi->demTongSoDe($mamondaotao);
		$random      =array_rand($data,$sodeboc);
		$ketqua      =array();
		if($sodeboc>1)
		{
			foreach ($random as $key => $value) {
				$ketqua[$key]=$data[$value];
			}
		}else{
			$ketqua[0]=$data[$random];
		}
		
		echo json_encode($ketqua); exit();
	}
	public function themToChucThi()
	{
		$diadiem     = $this->input->post('diadiemthi');
		$dd = "";
		foreach ($diadiem as $val) {
			$dd = $dd.$val.';';
		}
		$mamondaotao = $this->input->post('monchuongtrinhdaotao');
		$thoigianthi = $this->input->post('thoigianthi');
		$made        = $this->input->post('made');
		$phongthi	 = $this->input->post('phongthi');
		if(empty($phongthi))
		{
			$phongthi = 'Dự trữ';
		}
		$ngayboc = unix_time(date('d/m/Y h:s',time()));
		$soluongde   = $this->input->post('soluongde');
		$mamoinhat=$this->Mtochucthi->layMaMoiNhat();
		$mang=array();
		foreach ($made as $key => $value) {
			$mang[$key]['PK_sMaToChucThi']=created_id('TCT',$mamoinhat['max_id']+$key);
			$mang[$key]['FK_iMaDV']=$dd;
			$mang[$key]['FK_sMaDT']=$value;
			$mang[$key]['FK_sMaCB']=$this->_session['PK_sMaCB'];
			$mang[$key]['sThoiGianThi']=$thoigianthi;
			$mang[$key]['sPhongThi']=$phongthi[$key];
			$mang[$key]['sSoLuong']=$soluongde[$key];
			$mang[$key]['FK_sNgayBoc']=$ngayboc;
		}
		$arr = array(
			'PK_sNgayBoc' => $ngayboc,
			'sGhiChu'	=> $this->input->post('ghichu')
			);
		$rs = $this->Mtochucthi->themGhichu($arr);

		$kiemtra=$this->Mtochucthi->themToChucThi($mang);
		if($kiemtra>0 && $rs>0)
		{
			$this->capnhatTrangThai($made,$mamondaotao);
			setMessages("success", "", "Bốc đề thành công!");
			redirect(base_url().'tochucthi');
		}
		else{
			setMessages("error", "", "Bốc đề thất bại!");
		}
	}
	public function capnhatTrangThai($made,$mamondaotao)
	{
		$mangcapnhat=array();
		// $thoigian=time();
		foreach ($made as $key => $value) {
			$data=array(
				'FK_iMaTT'=> 2,
				// 'sThoiGian' =>$thoigian,
				'sNgaySuDung' => date('d/m/Y',time()),
				'FK_sMaCB'=>$this->_session['PK_sMaCB']
				); 
			$this->db->where('PK_sMaDT',$value);
			$this->db->update('tbl_dethi',$data);
		}
	}
	public function getInfo()
	{
		$id = $this->input->post('ID');
		$rs = $this->Mtochucthi->getInfo($id);
		if(!empty($rs))
		{
			echo json_encode($rs);
			exit();
		}
		else{
			$data = 'error';
			json_encode($data);
			exit();
		}
	}
	public function DanhSachDeDaBoc() {
    	$mondaotao = $this->input->get('mondaotao');

		$config['base_url']             = base_url().'tochucthi?mondaotao='.$mondaotao;
		$config['total_rows']           = $this->Mtochucthi->demDeDaBoc($mondaotao);
		$config['per_page']             = 10;
		$config['page_query_string']    = TRUE;
		$config['query_string_segment'] = 'page';
		$config['num_links']            = 2;
		$config['use_page_numbers']     = false;
		$config['full_tag_open']        = '<ul class="pagination">';
		$config['full_tag_close']       = '</ul>';
		$config['first_link']           = '&laquo';
		$config['last_link']            = '&raquo';
		$config['first_tag_open']       = '<li>';
		$config['first_tag_close']      = '</li>';
		$config['prev_link']            = '&lt';
		$config['prev_tag_open']        = '<li class="prev">';
		$config['prev_tag_close']       = '</li>';
		$config['next_link']            = '&gt;';
		$config['next_tag_open']        = '<li>';
		$config['next_tag_close']       = '</li>';
		$config['last_tag_open']        = '<li>';
		$config['last_tag_close']       = '</li>';
		$config['cur_tag_open']         = "<li class='active'><a style='cursor: not-allowed;' href='javasctipt:void(0);'>";
		$config['cur_tag_close']        = '</a></li>';
		$config['num_tag_open']         = '<li>';
		$config['num_tag_close']        = '</li>';

		$this->pagination->initialize($config);
		if($mondaotao == NULL) {
			$data['page']   = $this->input->get('page') ? $this->input->get('page') : 0;
		}else {
			$data['page'] = 0;
		}
    	$data['mamondaotao']      = $mondaotao;
		$data['info']       = $this->Mtochucthi->layDanhSachDeBoc($mondaotao,$config['per_page'], $data['page']);           
		$data['pagination'] = $this->pagination->create_links();

        return $data;
	}
}

/* End of file Ctochucthi.php */
/* Location: ./application/controllers/tochucthi/Ctochucthi.php */