<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cthemcanbo extends MY_Controller {

	public $_title   = 'Danh sách cán bộ';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('canbo/mcanbo');
	}

	public function index()
	{
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$data['title']    = 'Danh sách cán bộ';
		$data['button_name']  = 'xacnhan';
		$data['button_value'] = 'Xác Nhận';
		// lấy mã cán bộ mới nhất
		$ma_new = $this->mcanbo->layMaMoiNhat();
		$data['canbo']='';
		// mã cán bộ
		$action = $this->input->post('action');
		switch ($action) {
			case 'taikhoan':
					$this->checkAcc();
				break;
			
			default:
				# code...
				break;
		}
		$macanbo = $this->input->get('id');
		$macb = created_id('CB',$ma_new['max_id']);
		//Bấm thêm cán bộ
		if($this->input->post('xacnhan')) {
			$this->themcanbo($macb);
		}

		//Bấm sửa cán bộ
		if(!empty($macanbo))
		{
			$data['canbo'] = $this->LayDuLieuCanBo();
			// pr($data['canbo']);
			$data['linkanh'] = base_url().'assets/img/'.$macanbo;
			$data['button_name'] = 'capnhatcanbo';
			$data['button_value'] = 'Chỉnh sửa';
		}

		//Sửa cán bộ
		if($this->input->post('capnhatcanbo'))
		{
			$this->CapNhatCanBo();
		
		}
		$data['dsquyen'] = $this->mcanbo->getQuyen();
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$data['danhsachcb'] = $this->mcanbo->Listcanbo();

		// mặc định
		$data['message'] = getMessages();
		$temp['data']     = $data;
		$temp['template'] ='canbo/Vthemcanbo';
		$this->load->view('layout/layout',$temp);

	}
	public function checkAcc()
	{
		$acc = $this->input->post('Acc');
		$rs = $this->mcanbo->checkAcc($acc);
		if($rs <= 0)
		{
			$data = 'ok';
		}
		else
		{
			$data = 'error';
		}
		echo json_encode($data);
		exit();
	}
	//Thêm cán bộ
	public function themcanbo($macb){
		$tk = $this->input->post('taikhoan');
		$mk = $this->input->post('matkhau');
		$dulieu_canbo = array(
				'PK_sMaCB' 			=>$macb,
				'sTaiKhoan' 		=>$this->input->post('taikhoan'),
				'sMatKhau' 			=>sha1($this->input->post('nhaplaimk')),
				'sTenCB' 			=>$this->input->post('tencanbo'),
				'sGioiTinh' 		=>$this->input->post('gioitinh'),
				'sEmail' 			=>$this->input->post('email'),
				'sNgaySinh' 		=>$this->input->post('ngaysinh'),
				'sSDT' 				=>$this->input->post('phone'),
				'FK_iMaQuyen' 		=> $this->input->post('phanquyen')
		);
		$kiemtra = $this->mcanbo->themDuLieu($tk,$dulieu_canbo);
		if($kiemtra > 0)
		{
			$this->do_upload($macb);

			setMessages("success", "", "Thêm cán bộ thành công!");
			redirect(base_url().'canbo');
		}
		else{
			setMessages("error", "", "Có lỗi trong quá trình thêm. Vui lòng thử lại sau!");
		}

	}

	//Lấy dữ liệu
	public function LayDuLieuCanBo() {
			$ma_canbo = $this->input->get('id');
			return $this->mcanbo->Listcanbo($ma_canbo);
	}

	//Cập nhật lại môn
	public function CapNhatCanBo() {
		$ma_canbo = $this->input->get('id');
		$mk = $this->input->post('matkhau');
		$data_canbo = array(
			'sTenCB' 			=>$this->input->post('tencanbo'),
			'sGioiTinh' 		=>$this->input->post('gioitinh'),
			'sEmail' 			=>$this->input->post('email'),
			'sNgaySinh' 		=>$this->input->post('ngaysinh'),
			'sSDT' 				=>$this->input->post('phone'),
			'FK_iMaQuyen' 		=> $this->input->post('phanquyen')
		);
		$kiemtra = $this->mcanbo->CapNhatCB($ma_canbo, $data_canbo);
		$this->do_upload($ma_canbo);
		if($kiemtra > 0)
		{
			
			setMessages("success", "", "Sửa cán bộ thành công!");
			redirect(base_url().'canbo');
		}
		else{
			setMessages("error", "", "Có lỗi trong quá trình sửa. Vui lòng thử lại sau!");
		}
	}

	// up load ảnh
	public function do_upload($macanbo)
    {
		$config['file_name']     ="{$macanbo}.jpg";
		$config['overwrite']     = TRUE;
		$config['upload_path']   = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
      	if ($this->upload->do_upload('fileimage'))
      	{
      		return TRUE;
     	}
     	else{
     		setMessages("error", "", "Bạn chưa chọn ảnh!");
     	}
    }
}
?>