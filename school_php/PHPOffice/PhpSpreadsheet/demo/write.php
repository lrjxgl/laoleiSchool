<?php
/**
 * https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/#styles
 */
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
$spreadsheet = new Spreadsheet();
//添加表
$spreadsheet->createSheet();
$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, '工资表');
$spreadsheet->addSheet($myWorkSheet);
//获取当前表
$sheet = $spreadsheet->getActiveSheet();
//修改表名称
$sheet->setTitle("联系人");
for($ss=0;$ss<3;$ss++){
	//获取第几张表
	$sheet = $spreadsheet->getSheet($ss);
	//设置表样式
	//设置高
	$sheet->getRowDimension('1')->setRowHeight(30);
	//设置宽
	$sheet->getColumnDimension('A')->setWidth(14);
	$sheet->getColumnDimension('B')->setWidth(20);
	$sheet->getColumnDimension('C')->setWidth(22);
	$sheet->getStyle('B1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
	//设置首行
	$sheet
		->setCellValue('A1', 'ID')
		->setCellValue('B1', '名称')
		->setCellValue('C1', '电话')
	;
	//设置其他行
	$data=array(
		array(1,"老雷","1234567"),
		array(2,"老仙","23455"),
		array(3,"仙女","1231231")
		
	);
	for($i=4;$i<100;$i++){
		$data[]=array($i,"昵称{$i}","123666{$i}");
	}
	foreach($data as $k=>$v){
		$i=$k+2;
		$sheet
			->setCellValue("A{$i}", $v[0])
			->setCellValue("B{$i}", $v[1])
			->setCellValue("C{$i}", $v[2])
		;
	}
}
$writer = new Xlsx($spreadsheet);
$writer->save(date("his").'.xlsx');
echo "生成成功";