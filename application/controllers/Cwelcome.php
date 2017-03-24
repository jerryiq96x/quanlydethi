<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cwelcome extends MY_Controller {

	public function index()
	{
		$data['title']       = 'Chào mừng cán bộ';
		$data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$temp['data']        = $data;
		$temp['template']    = 'Vwelcome';
		$this->load->view('layout/layout', $temp);
	}
}
