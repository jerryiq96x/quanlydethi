<?php
	$data['url']  = base_url();
	$data['dethi'] = $this->session->userdata('dethi');
	// pr($data['dethi']);
	$chucnang = $this->uri->segment(1);
	// $rs = $CI->Mdangnhap->checkLink($data['dethi']['FK_iMaQuyen'],$chucnang);
	$rs = checkPermission($data['dethi']['FK_iMaQuyen'], $chucnang);
	// pr($rs);
	if(empty($rs))
	{
		redirect(base_url().'403_Forbidden');
	}
	$this->parser->parse('layout/top', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout/footer', $data);
?>