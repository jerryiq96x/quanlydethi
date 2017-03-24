<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csoluongdedonvi extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('baocaothongke/Msoluongdedonvi');
        $this->load->library('Excel');
    }
    public function index()
    {
        $data['title']    = 'Bảng kê số lượng đề thi';
        $data['dsdonvi']  = $this->layDuLieu(NULL,NULL,'tbl_donvi');
        $data['duongdananh'] = duongdananh($this->_session['PK_sMaCB']);
        // pr($data['dsdonvi']);
        $madonvi=$this->input->get('donvi');
        $dsmon='';
        $data['check'] = $madonvi;
        if(!empty($madonvi))
        {
            // $data['check'] = 'cham';
            $dsmon=$this->Msoluongdedonvi->layMonHeDonVi($madonvi);
            foreach ($dsmon as $key => $val) {
                $dsmon[$key]['trangthai']= $this->Msoluongdedonvi->thongke($val['PK_iMaMon'],$val['PK_iMaHe'],$madonvi);
            }
            if($this->input->get('export'))
            {
                $this->export($dsmon,$madonvi);
            }
        }
        // pr($dsmon);
        $data['tongde'] = $this->Msoluongdedonvi->getDethi($madonvi);
        // pr($data['tongde']);
        $data['donvi']    = $madonvi;
        $data['dsmon']    = $dsmon;
        $temp['data']     = $data;
        $temp['template'] = 'baocaothongke/Vsoluongdedonvi';
        $this->load->view('layout/layout', $temp, FALSE);
    }

    public function export($dsmon,$madonvi)
    {
        $sodethi = $this->Msoluongdedonvi->getDethi($madonvi);
        // pr($tong);
        // print_r($dsmon);
        // pr($madonvi);
        //xuất excel
        $objPHPExcel = new PHPExcel();
        $filename = 'soluongde'.' - '.date('d/m/Y',time());

        $objPHPExcel->getProperties()->setCreator("Administrator")
                                     ->setLastModifiedBy("Administrator")
                                     ->setTitle("Báo cáo số lượng đề thi")
                                     ->setSubject("Báo cáo số lượng đề thi")
                                     ->setDescription("Báo cáo số lượng đề thi")
                                     ->setKeywords("office 2010 openxml php")
                                     ->setCategory("Information of student");
        //Căn dòng
        $dinhdang = array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, //giua theo chieu ngang
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER, //giua theo chieu doc
            'rotation'   => 0, //khong quay
            'wrap'       => true //tu dong xuong dong
        );

        //bắt đầu lặp số cột 
        $cot = 'A';
        for($i=1;$i<=20;$i++){
            switch($cot) //xet do rong cho tung cot tuong ung
            {
                case 'A': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(10); break; //stt
                case 'B': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(20); break; //môn
                case 'C': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(12); break; //hệ
                case 'D': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(14); break; //số đề
                case 'E': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(15); break; //đề đã sử  dụng
                case 'F': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(18); break;//đề chưa sử  dụng
                case 'G': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(20); break;//ghi chú
                case 'H': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(20); break;
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
        $objPHPExcel->getActiveSheet()->mergeCells('C3:E3')->setCellValue('C3','BẢNG KÊ SỐ LƯỢNG ĐỀ THI');

        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30); //sét chiều cao của dòng số 3
        $rs = $this->Msoluongdedonvi->getDonvi($madonvi);
        $objPHPExcel->getActiveSheet()->mergeCells('C4:E4')->setCellValue('C4',$rs['sTenDonvi']);
        // $objPHPExcel->getActiveSheet()->mergeCells('C4:E4')->setCellValue('C4','Công nghệ sinh học');
        $objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(25); //sét chiều cao của dòng số 6
        $objPHPExcel->getActiveSheet()->setCellValue('A6','STT');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('B6','Môn học');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('C6','Hệ đào tạo');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('D6','Tổng số đề');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('E6','Đề chưa sử dụng');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('F6','Đề đã sử dụng');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('G6','Đề hủy: chưa sử dụng');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('G6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->setCellValue('H6','Đề hủy: đã sử dụng');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('H6')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        
        $startRow = 7;
        $endCol = 0;
        $i = 1;
        $col = array('A','B','C','D','E','F','G','H');
        foreach ($dsmon as $value) {
            // print_r($value);
            
            if(!empty($value['trangthai']))
            {
                $tong = 0;
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$startRow,$i++);
                $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow,$value['sTenMon']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$startRow,$value['sTenHe']);
                foreach($value['trangthai'] as $tt)
                {
                    $tong = $tong+$tt['tong'];
                }
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow,$tong);
                $giatri1=0;
                foreach($value['trangthai'] as $tt1)
                {
                    if($tt1['PK_iMaTT'] == 1)
                    {
                        $giatri1=$tt1['tong'];
                    }
                }
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$startRow,($giatri1)?$giatri1:0);
                $giatri2=0;
                foreach($value['trangthai'] as $tt1)
                {
                    if($tt1['PK_iMaTT'] == 2)
                    {
                        $giatri2=$tt1['tong'];
                    }
                }
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$startRow,($giatri2)?$giatri2:0);
                $giatri3=0;
                foreach($value['trangthai'] as $tt1)
                {
                    if($tt1['PK_iMaTT'] == 3)
                    {
                        $giatri3=$tt1['tong'];
                    }
                }
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$startRow,($giatri3)?$giatri3:0);
                $giatri4=0;
                foreach($value['trangthai'] as $tt1)
                {
                    if($tt1['PK_iMaTT'] == 4)
                    {
                        $giatri4=$tt1['tong'];
                    }
                }
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$startRow,($giatri4)?$giatri4:0);
            }
            else{
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$startRow,$i++);
                $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow,$value['sTenMon']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$startRow,$value['sTenHe']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow,0);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$startRow,0);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$startRow,0);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$startRow,0);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$startRow,0);
            }
            $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getFont()->setSize(14)->setBold(true);
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
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$startRow.':'.'C'.$startRow)->setCellValue('A'.$startRow,'Tổng');
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getRowDimension($startRow)->setRowHeight(24);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A'.$startRow.':'.'C'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$startRow)->getFont()->setSize(14)->setBold(true); //chữ đậm, căn giữa

        $objPHPExcel->getActiveSheet()->setCellValue('D'.$startRow,count($sodethi));
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$startRow)->getFont()->setSize(14)->setBold(true);
        $dem = 0;
        foreach($sodethi as $s)
        {
            if($s['FK_iMaTT'] == 1)
            {
                $dem = $dem+1;
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$startRow,$dem);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('E'.$startRow)->getFont()->setSize(14)->setBold(true);
        $dem1 = 0;
        foreach($sodethi as $s)
        {
            if($s['FK_iMaTT'] == 2)
            {
                $dem1 = $dem1+1;
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$startRow,$dem1);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$startRow)->getFont()->setSize(14)->setBold(true);

        $dem2 = 0;
        foreach($sodethi as $s)
        {
            if($s['FK_iMaTT'] == 3)
            {
                $dem2 = $dem2+1;
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$startRow,$dem2);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('G'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$startRow)->getFont()->setSize(14)->setBold(true);

        $dem3 = 0;
        foreach($sodethi as $s)
        {
            if($s['FK_iMaTT'] == 4)
            {
                $dem3 = $dem3+1;
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$startRow,$dem3);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('H'.$startRow)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->getActiveSheet()->getStyle('H'.$startRow)->getFont()->setSize(14)->setBold(true);
        // exit();
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
        $objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(14)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setSize(15)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C4')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('D6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('E6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('G6')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('H6')->getFont()->setSize(13)->setBold(true);
        $st2 = $startRow+3;

        $objPHPExcel->getActiveSheet()->mergeCells('F'.$st2.':H'.$st2)->setCellValue('F'.($startRow+3),'Ngày '.date('d',time()).' tháng '.date('m',time()).' năm '.date('Y',time()));
        $objPHPExcel->getActiveSheet()->mergeCells('F'.($st2+1).':H'.($st2+1))->setCellValue('F'.($startRow+4),'NGƯỜI LẬP');
        $objPHPExcel->getActiveSheet()->getStyle('F'.($startRow+4))->getFont()->setSize(16)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('F'.($startRow+4))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F'.$st2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('F'.$st2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=".$filename.".xls");
        header("Cache-Control: max-age=0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        redirect(base_url() . 'danhsachde');
    }

}

/* End of file Csoluongdedonvi.php */
/* Location: ./application/controllers/baocaothongke/Csoluongdedonvi.php */