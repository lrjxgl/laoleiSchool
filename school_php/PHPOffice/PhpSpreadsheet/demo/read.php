<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$inputFileType = 'Xlsx';
$inputFileName = 'hello.xlsx';
class MyReadFilter implements IReadFilter
{
    public function readCell($column, $row, $worksheetName = '')
    {
		return true;
        //设定读取行列
        if ($row >= 1 && $row <= 7) {
            if (in_array($column, range('A', 'E'))) {
                return true;
            }
        }

        return false;
    }
}

$filterSubset = new MyReadFilter();
$reader = IOFactory::createReader($inputFileType);
//单表
$reader->setLoadSheetsOnly("联系人");
$reader->setReadFilter($filterSubset);
$spreadsheet = $reader->load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
print_r($sheetData);
//多表
$filterSubset = new MyReadFilter();
$reader = IOFactory::createReader($inputFileType);
$reader->setLoadAllSheets();

$reader->setReadFilter($filterSubset);
$spreadsheet = $reader->load($inputFileName);

for($i=0;$i<$spreadsheet->getSheetCount();$i++){
	$tables[]=$row=$spreadsheet->getSheet($i)->toArray(null, true, true, true);
	/*
	DB::insert(array(
		"id"=>$row[0],
		"title"=>$row[1],
		"telephone"=>$row[2]
	);
	*/
}
print_r($tables);

