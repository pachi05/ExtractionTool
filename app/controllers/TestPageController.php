<?php

class TestPageController extends BaseController {

	protected $layout = 'layouts.master';

	public function showTestPage()
	{
		$this->createCSV();
		$this->layout->content = View::make('testResult.test');
	}

	public function createCSV()
	{
		header('Content-Type: text/csv; charset=utf-8');
	 	header('Content-Disposition: attachment; filename=ResultData.csv');

	 	$output = fopen('php://output', 'w');

	 	fputcsv($output, array('Id','MeterID', 'MeterPlace', 'SerialNo', 'MeterNo', 'ScanCode', 'Model', 'Type', 'Voltage', 'Current', 'Constant', 'Precision', 'WireModel', 'Frequency', 'SerialDate', 'MadePlace',	'TEMP', 'HUMIDITY',	'TESTER', 'RETESTER', 'MANAGE',	'TESTDATE',	'STARTEST',	'HIDDENTEST', 'StopTest', 'StartCurrent', 'Resistance',	'PIEZO', 'TESTYER', 'TESTMON', 'TESTDAY', 'MINCURR', 'WALKTEST', 'STARTDEG', 'ENDDEG', 'CUNDUTOTAL', 'CUNDUPEAK', 'CUNDUVALEY',	'Conclusion', 'Net', 'StartTime', 'HideTime'));
		
		$testResults = TestResult::where('_testdate', '>=', $querydate['dateFrom'])
		  	->where('_testdate', '<=', $querydate['dateTo'])
		  	->get();

		while ($row = mysql_fetch_assoc($testResults)) fputcsv($output, $row);

		fclose($output);

		alert('it works!');
	}
	
}