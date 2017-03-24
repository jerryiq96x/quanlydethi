<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $_session;

	public function __construct() {
		parent::__construct();
		$this->_session = $this->session->userdata['dethi'];
		
		// Không có session, đá về trang đăng nhập
		if(!isset($this->_session) || empty($this->_session)) {
			redirect(base_url().'dangnhap');
			exit();
		}
	}
	/**
	* lấy danh sách hoặc 1 dự liệu 
	*/
	public function layDuLieu($primary_key=NULL,$id=NULL,$table)
	{
		if(!empty($id))
		{
			$this->db->where($primary_key,$id);
		}
		return $this->db->get($table)->result_array();
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
?>