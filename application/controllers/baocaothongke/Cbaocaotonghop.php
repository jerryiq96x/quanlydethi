<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbaocaotonghop extends MY_Controller {

	public function __construct()
	{

		parent:: __construct();
		$this->load->library('Excel');
		$this->load->model('baocaothongke/Mbaocaotonghop');
	}
	public function index()
	{
		$data['title'] = 'Báo cáo tổng hợp số lượng đề của các đơn vị';
        $data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
		$batdau=$this->input->get('batdau');
		$ketthuc=$this->input->get('ketthuc');
		$data['thongke']='';
		if($this->input->get('thongke'))
		{
			$data['thongke'] = $this->tonghop($batdau,$ketthuc);
		}
		if ($this->input->get('in')) {
				$laydonvi = $this->tonghop($batdau,$ketthuc);
                // pr($laydonvi);
				$this->inexcel($laydonvi);
			}

		$data['batdau']  =$batdau;
		$data['ketthuc'] =$ketthuc;

		//print_r($data['thongke']); exit();
		$temp['data']    = $data;
		$temp['template'] = 'baocaothongke/Vbaocaotonghop';
		$this->load->view('layout/layout', $temp, FALSE);
	}
	public function tonghop($batdau,$ketthuc)
	{
		$mang=array();
			// lấy số đề trong khoảng thời gian truyền vào và chưa dùng
			$mon=$this->Mbaocaotonghop->layMaMonCTDT(unix_time($batdau),unix_time($ketthuc));
			if(!empty($mon))
			{
				$mangmon=array();
				foreach ($mon as $key => $value) {
					$mangmon[$key]=$value['FK_iMaMonCTDT'];
				}
			}
			else{
				$mangmon=0;
			}

			//lấy ra tổng môn theo từng đơn vị
			$tongmon=$this->Mbaocaotonghop->layMonChuaDung($mangmon);
			$mangtongmon=array();
			foreach ($tongmon as $key => $value) {
				$mangtongmon[$value['FK_iMaDonvi']]=$value['tongmon'];
			}
			// đếm tổng số đề của đơn vị
			$donvi=$this->Mbaocaotonghop->laySoDeChuaDung(unix_time($batdau),unix_time($ketthuc));
			foreach ($donvi as $key => $value) {
				$mang[$value['FK_iMaDonvi']]=$value['tongde'];
			}
			$laydonvi=$this->layDuLieu(NULL,NULL,'tbl_donvi');
			foreach ($laydonvi as $key => $value) {
				if(isset($mang[$value['PK_iMaDonvi']]))
				{
					$laydonvi[$key]['tong']=$mang[$value['PK_iMaDonvi']];
				}
				else{
					$laydonvi[$key]['tong']=0;
				}
			}
			foreach ($laydonvi as $key => $value) {
				if(isset($mangtongmon[$value['PK_iMaDonvi']]))
				{
					$laydonvi[$key]['tongmon']=$mangtongmon[$value['PK_iMaDonvi']];
				}
				else{
					$laydonvi[$key]['tongmon']=0;
				}
			}
			return $laydonvi;
	}
	function inexcel($laydonvi){
        //xuất excel
        $objPHPExcel =new PHPExcel();
        $filename='tonghop'.' - '.date('d/m/Y',time());
        //
        $objPHPExcel->getProperties()->setCreator("Administrator")
                                     ->setLastModifiedBy("Administrator")
                                     ->setTitle("Báo Cáo Tổng Hợp")
                                     ->setSubject("Báo Cáo Tổng Hợp")
                                     ->setDescription("Báo Cáo Tổng Hợp")
                                     ->setKeywords("office 2010 openxml php")
                                     ->setCategory("Information of student");
        //Căn dòng chữ
        $dinhdang = array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, //giua theo chieu ngang
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER, //giua theo chieu doc
            'rotation'   => 0, //khong quay
            'wrap'       => true //tu dong xuong dong
            );

        //Bắt đầu lặp theo số cột trong excel
        $cot='A';

        for($i=1;$i<=20;$i++){
            switch($cot) //xet do rong cho tung cot tuong ung
            {
                case 'A': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break; //stt
                case 'B': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(40); break; //Khoa
                case 'C': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(10); break; //số môn
                case 'D': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(26); break; //số lượng đề còn lại
                case 'E': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(15); break; //ghi chú
                case 'F': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(10); break;
                case 'G': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(10); break;
                default: $objPHPExcel->setActiveSheetIndex()->getColumnDimension($cot)->setAutoSize(true); break;
            }
            $cot++;
        }
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(13);
        $maxR=$objPHPExcel->getActiveSheet()->getHighestRow();

        //Căn lề trái phải
        $objPHPExcel->getActiveSheet()
                    ->getPageMargins()
                    ->setRight(0)
                    ->setLeft(0);
        //Phần tiêu đề (nếu có)
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:B1')->setCellValue('A1','VIỆN ĐẠI HỌC MỞ HÀ NỘI');
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(25); //sét chiều cao của dòng số 1
        $objPHPExcel->getActiveSheet()->mergeCells('A2:B2')->setCellValue('A2','PHÒNG KHẢO THÍ & ĐBCL');
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25); //sét chiều cao của dòng số 2
        $objPHPExcel->getActiveSheet()->mergeCells('C3:H3')->setCellValue('C3','BẢNG BÁO CÁO TỔNG HỢP SỐ LƯỢNG ĐỀ CÒN LẠI CỦA CÁC KHOA');
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30); //sét chiều cao của dòng số 3

         $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(25); //sét chiều cao của dòng số 6
        $objPHPExcel->getActiveSheet()->setCellValue('A6','STT');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('B6','Khoa');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('C6','Số môn');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('D6','Số lượng đề còn lại T3/ 2016');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('E6','Ghi chú');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $startRow = 7;
        $endCol = 0;
        $i = 1;
        $col = array('A','B','C','D','E');
        foreach ($laydonvi as $value) {
            // print_r($value);
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$startRow,$i++);
            $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow,$value['sTenDonvi']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$startRow,$value['tongmon']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow,$value['tong']);

            foreach ($col AS $k){
                $objPHPExcel->setActiveSheetIndex(0)->getStyle($k.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                    // $objPHPExcel->getActiveSheet()->getStyle('B'.$startRow)->getFont()->setItalic(true)->getColor()->setRGB('ff0000');
                $objPHPExcel->getActiveSheet()
                    ->getStyle('B'.$startRow)->getFill()
                    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor();
                    // ->setRGB('CCC0DA');
            }
            $startRow++;
        }
        // tổng cuối
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$startRow.':'.'B'.$startRow)->setCellValue('A'.$startRow,'Tổng');
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getRowDimension($startRow)->setRowHeight(24);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$startRow.':'.'B'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getFont()->setSize(14)->setBold(true); //chữ đậm, căn giữa

        $dem = 0;
        foreach($laydonvi as $l)
        {
            $dem = $dem+$l['tongmon'];
        }
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$startRow,$dem);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('C'.$startRow)->getFont()->setSize(14)->setBold(true);

        $dem1 = 0;
        foreach($laydonvi as $l)
        {
            $dem1 = $dem1+$l['tong'];
        }
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow,$dem1);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getFont()->setSize(14)->setBold(true);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
         //Người lập biểu
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow.($startRow++))->setCellValue('B'.$startRow, 'NGƯỜI LẬP BIỂU');
        $objPHPExcel->getActiveSheet()->getStyle('B'.$startRow)->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //hà nội ngày tháng
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow.($startRow+1))->setCellValue('D'.$startRow, 'Hà Nội ,ngày       tháng          năm');
        $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getFont()->setSize(13);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        //phòng khảo thí và đảm bảo chất lượng
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow.($startRow++))->setCellValue('D'.$startRow, 'Phòng Khảo Thí & ĐBCL');
        $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getFont()->setSize(13)->setBold(true);


        //style  phần đầu
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); //dọc
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); //dọc
        $objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setSize(15)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C4')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E6')->getFont()->setSize(13)->setBold(true);
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=".$filename.".xls");
        header("Cache-Control: max-age=0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        redirect(base_url() . 'baocaotonghop');
    }

}

/* End of file Cbaocaotonghop.php */
/* Location: ./application/controllers/baocaothongke/Cbaocaotonghop.php */