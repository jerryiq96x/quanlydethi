<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C403 extends CI_Controller {
	public $_title = 'Từ chối truy cập'; 
	protected $Error; 
	public function __construct() {
		parent:: __construct();
	}
	public function index()
	{
		$data['url'] = base_url();
		$data['title'] = $this->_title;
		$data['Error'] = $this->Error;
		$this->parser->parse('errors/Error_403', $data);
	}

}

/* End of file C403.php */
/* Location: ./application/controllers/403.php */