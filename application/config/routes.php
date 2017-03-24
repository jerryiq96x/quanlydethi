<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']           = 'Cdangnhap';
$route['404_override']                 = '';
$route['403_Forbidden']				   = 'C403';
$route['dangnhap']                     = 'Cdangnhap'; 
$route['dangxuat']                     = 'Cdangnhap/DangXuat';
// cán bộ
$route['canbo']                        = 'canbo/ccanbo';
$route['themcanbo']                    = 'canbo/Cthemcanbo';
$route['doimatkhau']                   = 'canbo/Cdoimatkhau';
//	đề thi
$route['baocaothongke']                ='dethi/Cbaocaothongke';
// $route['chitietthongke/[0-9]+/[0-9]+'] ='dethi/Cchitietthongke';
$route['dethi']                        ='dethi/Cdethi';
$route['dsdethi']                      ='dethi/Cdsdethi';
$route['chuongtrinhdaotao']            ='dethi/Cchuongtrinhdaotao';
// tổ chức thi
$route['tochucthi']                    = 'tochucthi/Ctochucthi';
//danh mục
$route['monhoc']                       = 'danhmuc/Cmonhoc';
$route['diadiem']                      = 'danhmuc/Cdiadiem';
$route['nganh']                        = 'danhmuc/Cnganh';
$route['khoa']						   = 'danhmuc/Ckhoa';
$route['trinhdo']						= 'danhmuc/Ctrinhdo';
// báo cáo thống kê
$route['soluongdedonvi']               ='baocaothongke/Csoluongdedonvi';
$route['baocaotonghop']                ='baocaothongke/Cbaocaotonghop';
$route['bienbanchonde']				= 'baocaothongke/Cbienbanchonde';
$route['daotaotuxa'] 				= 'baocaothongke/Cdaotaotuxa';
$route['bangiaodethi'] 				= 'baocaothongke/Cbienbangiaode';
//biên bản
$route['bienbangiaodethi'] = 'bienban/Cbangiaodethi';
// welcome
$route['welcome.html']                 = 'Cwelcome';
$route['translate_uri_dashes']         = FALSE;
?>