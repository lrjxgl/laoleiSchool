<?php
require "../Classes/PHPExcel.php";
$excel = new PHPExcel();
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(36); 
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); 
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
//定义表结构
$excel->setActiveSheetIndex(0)
	->setCellValue("A1", "ID") 
	->setCellValue("B1", "名字")           
	->setCellValue("C1", "电话")
;
for($i=2;$i<10;$i++){
	$excel->setActiveSheetIndex(0)
			->setCellValue("A{$i}", $i) 
			->setCellValue("B{$i}","名字{$i}")           
			->setCellValue("C{$i}", "电话{$i}")
	;
}
$filename="test.xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');

?>