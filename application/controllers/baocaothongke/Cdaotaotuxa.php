<?php
/**
* 
*/
class Cdaotaotuxa extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		// $data['tittle'] = 'Biên bản chọn đề';
		// $temp['data']        = $data;
		// $temp['template']= 'baocaothongke/bienbanchondethi';
		$this->load->view('baocaothongke/daotaotuxa');
	}
}
?>