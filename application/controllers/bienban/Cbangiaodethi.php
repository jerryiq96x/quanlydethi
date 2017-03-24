<?php
/**
* FFC
*/
class Cbangiaodethi extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('bienban/Mbangiaodethi');
		$this->load->library('Excel');
	}
	public function index()
	{
		$data['title'] = 'Biên bản bàn giao đề thi';
		$data['bt_type'] = 'submit';
		$data['duongdananh']    = duongdananh($this->_session['PK_sMaCB']);
		$act = $this->input->post('action');
		switch ($act) {
			case 'getHe':
					$this->getHe();
				break;
			case 'getMon':
					$this->getMon();
				break;
			
			default:
				# code...
				break;
		}
		if($this->input->post('ok'))
		{
			$donvi = $this->input->post('sl_donvi');
			$he = $this->input->post('rd_he');
			$tct = $this->input->post('hd_tct');
			$rs = $this->Mbangiaodethi->getMon($tct,null,null);
			$time = ($this->input->post('time').', ngày '.$this->input->post('ngay').' tháng '.$this->input->post('thang').' năm '.$this->input->post('nam'));
			$sobienban = $this->input->post('sobienban');
			$giao = $this->input->post('bengiao');
			$nhan = $this->input->post('bennhan');
			$this->insert();
			
			$this->export($donvi,$he,$tct,$rs,$time,$giao,$sobienban,$nhan);
		}
		if($this->input->post('ok'))
		{
			$data['bt_type'] = 'button';
		}
		$data['bb'] = $this->input->post('hd_bb');
		$data['donvi'] = $this->Mbangiaodethi->getDonvi(null);

		$temp['data'] = $data;
		$temp['template'] = 'bienban/Vbangiaodethi';
		$this->load->view('layout/layout',$temp);
		
	}
	public function insert()
	{
		$id = $this->input->post('hd_bb');
		$arr = array(
			'PK_iMaBienban'		=> $id,
			'tGio'				=> $this->input->post('time'),
			'tNgay'				=> $this->input->post('ngay'),
			'tThang'			=> $this->input->post('thang'),
			'tNam'				=> $this->input->post('nam'),
			'sBengiao'			=> $this->input->post('bengiao'),
			'sBennhan'			=> $this->input->post('bennhan')
		);
		$rs = $this->Mbangiaodethi->insertBienban($arr);
		$ds_tct = $this->input->post('hd_tct');
		$data = array();
		if(!empty($ds_tct))
		{
			foreach ($ds_tct as $key => $val) {
				$data[$key]['PK_sMaToChucThi'] = $val;
				$data[$key]['PK_iMaBienban'] = $id;
			}
			$rs2 = $this->Mbangiaodethi->insertBienban_TCT($data);
		}
		else{
			setMessages("error", "", "Không có môn thi!");
		}
	}
	public function export($donvi,$he,$tct,$rs,$time,$giao,$sobienban,$nhan)
	{

		$objPHPExcel = new PHPExcel();
        $filename = 'bienbangiaode'.' - '.date('d/m/Y',time());

        $objPHPExcel->getProperties()->setCreator("Administrator")
                                     ->setLastModifiedBy("Administrator")
                                     ->setTitle("Biên bản bàn giao đề thi")
                                     ->setSubject("Biên bản bàn giao đề thi")
                                     ->setDescription("Biên bản bàn giao đề thi")
                                     ->setKeywords("office 2010 openxml php")
                                     ->setCategory("Information of student");
        //Căn dòng
        $dinhdang = array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, //giua theo chieu ngang
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER, //giua theo chieu doc
            'rotation'   => 0, //khong quay
            'wrap'       => true //tu dong xuong dong
        );

        $cot = 'A';
        for($i=1;$i<=20;$i++){
            switch($cot) //xet do rong cho tung cot tuong ung
            {
                case 'A': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break; //stt
                case 'B': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(5); break; //môn
                case 'C': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break; //hệ
                case 'D': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break; //số đề
                case 'E': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break; //đề đã sử  dụng
                case 'F': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break;//đề chưa sử  dụng
                case 'G': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(8); break;//ghi chú
                case 'H': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(12); break;
                case 'I': $objPHPExcel->getActiveSheet()->getColumnDimension($cot)->setWidth(12); break;
                default: $objPHPExcel->setActiveSheetIndex()->getColumnDimension($cot)->setAutoSize(true); break;
            }
            $cot++;
        }
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(13);
        $maxR=$objPHPExcel->getActiveSheet()->getHighestRow();
        //căn lề
        $objPHPExcel->getActiveSheet()
                    ->getPageMargins()
                    ->setRight(0)
                    ->setLeft(0);
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');

        $objPHPExcel->getActiveSheet()->mergeCells('A1:C1')->setCellValue('A1','VIỆN ĐẠI HỌC MỞ HÀ NỘI');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:C2')->setCellValue('A2','HỘI ĐỒNG THI TN');
        $objPHPExcel->getActiveSheet()->mergeCells('A3:C3')->setCellValue('A3','BAN ĐỀ THI');
        $objPHPExcel->getActiveSheet()->mergeCells('A4:C4')->setCellValue('A4','BIÊN BẢN SỐ: '.$sobienban);
        $objPHPExcel->getActiveSheet()->getStyle('A1:A2')->getFont()->setSize(11)->setBold(false);
        $objPHPExcel->getActiveSheet()->getStyle('A3:A4')->getFont()->setSize(11)->setBold(true);
        $objPHPExcel->getActiveSheet()->mergeCells('F1:J1')->setCellValue('F1','CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM');
		$objPHPExcel->getActiveSheet()->mergeCells('F2:J2')->setCellValue('F2','Độc Lập - Tự Do - Hạnh Phúc');
		$objPHPExcel->getActiveSheet()->mergeCells('C6:H6')->setCellValue('C6','BIÊN BẢN GIAO NHẬN ĐỀ THI');
		$objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setSize(16)->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('F1:F2')->getFont()->setSize(11)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A1:F6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('A1:F6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->setCellValue('A8','Vào hồi: '.$time);
        $objPHPExcel->getActiveSheet()->setCellValue('A9','Tại Phòng Khảo thí và Đảm bảo chất lượng, Chúng tôi gồm:');
        // pr($giao);
        $objPHPExcel->getActiveSheet()->setCellValue('A10','Bên giao: ');
        $objPHPExcel->getActiveSheet()->setCellValue('B10',$giao);
        $objPHPExcel->getActiveSheet()->getStyle('B10')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->setCellValue('A11','Bên nhận: '.$nhan);
        $objPHPExcel->getActiveSheet()->setCellValue('B11',$nhan);
        $objPHPExcel->getActiveSheet()->getStyle('B11')->getFont()->setSize(13)->setBold(true);
        $dv = $this->Mbangiaodethi->getDonvi($donvi);
        $objPHPExcel->getActiveSheet()->setCellValue('A12','Tổ chức bàn giao đề thi tốt nghiệp hệ '.$he.' tại khoa '.$dv[0]['sTenDonvi']);
        $objPHPExcel->getActiveSheet()->setCellValue('A13','Số lượng '.count($rs).' túi đề cụ thể các môn như sau:');

        $objPHPExcel->getActiveSheet()->setCellValue('B15','STT');
        $objPHPExcel->getActiveSheet()->mergeCells('C15:G15')->setCellValue('C15','MÔN THI');
        $objPHPExcel->getActiveSheet()->setCellValue('H15','PHÒNG THI');
        $objPHPExcel->getActiveSheet()->setCellValue('I15','SỐ LƯỢNG');
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B15:I15')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B15:I15')->getFont()->setSize(13)->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('B15:I15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//ngang
        $objPHPExcel->getActiveSheet()->getStyle('B15:I15')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        // pr($rs);
        $startRow = 16;
        $endCol = 0;
        $i = 1;
        $col = array('B','C','D','E','F','G','H','I');
        foreach ($rs as $val) {
        	$objPHPExcel->getActiveSheet()->setCellValue('B'.$startRow,$i++);
        	$objPHPExcel->getActiveSheet()->mergeCells('C'.$startRow.':G'.$startRow)->setCellValue('C'.$startRow,$val['sTenMon']);
        	$objPHPExcel->getActiveSheet()->setCellValue('H'.$startRow,($val['sPhongThi'])?$val['sPhongThi']:'Dự trữ');
        	$objPHPExcel->getActiveSheet()->setCellValue('I'.$startRow,$val['sSoLuong']);
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

        $objPHPExcel->getActiveSheet()->setCellValue('A'.($startRow+1),'+ Tình trạng bàn giao: Đề thi được đựng trong túi đựng đề thi và được đóng dấu niêm phong.');
        // pr($startRow+1);
        $objPHPExcel->getActiveSheet()->setCellValue('A'.($startRow+2),'+ Đề thi đã đủ số lượng so với yêu cầu đặt đề thi của Ban Thư ký tại địa điểm thi.');
        $objPHPExcel->getActiveSheet()->setCellValue('B'.($startRow+4),'NGƯỜI NHẬN');
        $objPHPExcel->getActiveSheet()->setCellValue('H'.($startRow+4),'NGƯỜI GIAO');
        $x = $startRow+4;
        // pr($x);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B'.$x.':H'.$x)->getFont()->setSize(14)->setBold(true);


        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=".$filename.".xls");
        header("Cache-Control: max-age=0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');

		// exit();
	}
	public function getHe()
	{
		$id = $this->input->post('ID');
		$rs = $this->Mbangiaodethi->getHeDT($id);
		if(!empty($rs))
		{
			echo json_encode($rs);
			exit();
		}
		else{
			$data = 'error';
			echo json_encode($data);
			exit();
		}
	}
	public function getMon(){
		$tenHe = $this->input->post('He');
		$dv = $this->input->post('DV');
		$rs = $this->Mbangiaodethi->getMon(null,$tenHe,$dv);
		if(!empty($rs))
		{
			echo json_encode($rs);
			exit();
		}
		else
		{
			$data = 'error';
			echo json_encode($data);
			exit();
		}
	}
}
?>