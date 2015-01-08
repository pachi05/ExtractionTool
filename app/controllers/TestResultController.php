<?php

class TestResultController extends BaseController {

	protected $layout = 'layouts.master';

	public function showResults()
	{
	// 	$querydate = array(
	// 		'dateFrom' 	=> Input::get('dateFrom'),
	// 		'dateTo'	=> Input::get('dateTo'));

	// 	try
	// 	{

	// 		$testResults = TestResult::where('_testdate', '>=', $querydate['dateFrom'])
	// 	  	->where('_testdate', '<=', $querydate['dateTo'])
	// 	  	->paginate(10);

	// 	  	$rowCount = TestResult::where('_testdate', '>=', $querydate['dateFrom'])
	// 	  	->where('_testdate', '<=', $querydate['dateTo'])
	// 	  	->count();	
	// 	}
	// 	catch(exception $e)
	// 	{
	// 		$testResults = TestResult::where('_testdate', '>=', date('Y-m-d'))
	// 	  	->where('_testdate', '<=', date('Y-m-d'))
	// 	  	->paginate(10);

	// 	  	$rowCount = 0;
	// 	}

	// 	$inputDate = $this->setInputDate();
	// 	$this->layout->content = View::make('testResult.viewResults')
	// 		->with('testResults', $testResults)
	// 		->with('rowCount', $rowCount)
	// 		->with('inputDate', $inputDate);
		

	// }

	// public function setInputDate()
	// {
	// 	if(Input::get('dateFrom') === NULL && Input::get('dateTo') === NULL)
	// 	{
	// 		$today = date('Y-m-d');
	// 		return array ($today, $today);
	// 	}
	// 	else
	// 	{
	// 		return array(Input::get('dateFrom'), Input::get('dateTo'));
	// 	}
		$this->test();
	}

	public function createTestResultsList()
	{
		$fileName = 'TestResults_'.Input::get('dateFrom').'_'.Input::get('dateTo').'_'.date("Y_m_d_His");
		$dateCreated = date('Y-m-d H:i:s');
		$createdBy = 'admin';
		Excel::create($fileName, function($excel) {
			$excel->setTitle('TestResults_'.Input::get('dateFrom').'_'.Input::get('dateTo')) 
			->setCreator('TeamTMC-IT')
			->setCompany('MLI-TMC')
			->setLastModifiedBy('MLIExtractionTool v1.0');

			$excel->sheet('TestResults', function($sheet) {
				$sheet->setOrientation('landscape');
				$sheet->fromModel(TestResult::all());
			});
		})->store('csv');

		$createdFile = new GeneratedFile();
		$createdFile->_fileName = $fileName;
		$createdFile->_extension = "csv";
		$createdFile->_dateCreated = $dateCreated;
		$createdFile->_createdBy = $createdBy;
		$createdFile->save();

		return Redirect::to('generatedResults');
	}


public function getFile()
{
ini_set('max_execution_time',1000000);
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');
$total=0;
$FieldCounter=0;
$cellAddress='E4';
$ctr = 0;
$flag =true;
$FO="XLS";
$date='12/12/13';
$path = 'C:\xampp\htdocs\laravel\KpOutToExcel.xls';
echo 'Loading file ',pathinfo($path,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
$Filetype = PHPExcel_IOFactory::identify($path);
$objreader =PHPExcel_IOFactory::createReader($Filetype);
$objPHPExcel = $objreader->load($path);
echo '<hr />';
			 try 
			 {
			while ($flag==true) 
				{
	
	
	 				$objWorksheet = $objPHPExcel->setActiveSheetIndex($ctr);
	 				$MeterNo = $objPHPExcel->getActiveSheet()->rangeToArray('C8:C27');
	 				$VoltageTest=$objPHPExcel->getActiveSheet()->rangeToArray('V8:V27');
	 				$Conclusion=$objPHPExcel->getActiveSheet()->rangeToArray('W8:W27');
	 				$temp=$objPHPExcel->getActiveSheet()->getCell('O4')->getValue();
	 	/// MERGED CELLS
							foreach ($objPHPExcel->getActiveSheet()->getMergeCells() as $range) 
								{
									if ($objPHPExcel->getActiveSheet()->getCell($cellAddress)->isInRange($range)) 
									{
         						   		  $rangeDetails = PHPExcel_Cell::splitRange($range);
          						   		  $result = $objPHPExcel->getActiveSheet()->getCell($rangeDetails[0][0])->getValue();
           								  $foundInRange = true;
             								 break;
               						}

      							}
       								if (!$foundInRange) 
       								{
         		  					$result = $objPHPExcel->getActiveSheet()->getCell($cellAddress)->getValue();
        							}
      								$Current =$result;


	 				$classe=$objPHPExcel->getActiveSheet()->getCell('H4')->getValue();
	 				$Const=$objPHPExcel->getActiveSheet()->getCell('K4')->getValue().$objPHPExcel->getActiveSheet()->getCell('L4')->getValue();
	 				$model=$objPHPExcel->getActiveSheet()->getCell('C4')->getValue();
	 	
	 
	 						while ($FieldCounter < 20)
	 							 {
	 	 							if (empty($MeterNo[$FieldCounter][0])) {
	 	 
	 	 								$flag=false;
	 	 								break;
	 	 						 }

	 	 
					///SAVE RECORD
						$testresults = new testResult;
						$testresults->_meterNo = $MeterNo[$FieldCounter][0];
						$testresults->_current = $Current;
						$testresults->_constant = $Const;
						$testresults->_model = $model;
						$testresults->_temp = $temp;
						$testresults->_conclusion24h = $VoltageTest[$FieldCounter][0];
						$testresults->_conclusion = $Conclusion[$FieldCounter][0];
						$testresults->_FirstOrigin =$FO;
						$testresults->_testdate=$date;
						$testresults->save();
						echo "<br/>"."Record saved";
						$FieldCounter++;

					}
	
		 				$ctr++;
						$FieldCounter=0;


 				}
						echo "<br/>".$MeterNo[$i];
		
			} catch (Exception $e) 
				{
					
					 echo "<br/>"."Successfully added all records";
					
					
				}

}


function checkDataXLS()
{
		$testresults = new testResult;
		$date ='NULL';
		
		$query = testResult::where('_testdate','=',$date)->count();
		
		
}


	public function test()
	{
	ini_set('max_execution_time',1000000);
	$ctr =0;
	
	$DSN="TestData";
	$user="root";
	$pass="root";
	$row;
	$DB =odbc_connect($DSN,$user,$pass);
	$rec = odbc_exec($DB,"Select * From Transfer" );
	$row =array();

	//$result = DB::Select("Select * From Transfer");

		if (!$rec)
		 {
			die("Unable to connect" + odbc_errormsg());
		 }
 		else
 		{
 			while ($row=odbc_fetch_array($rec)) 
				{ // START OF WHILE 
				$MeterNo=$row['MeterNo'];
				$Model =$row['Model'];
				$Current=$row['Current'];
				$Constant=$row['Constant'];
				$TEMP=$row['TEMP'];
				$HUMIDITY=$row['HUMIDITY'];
				$TESTDATE=$row['TESTDATE'];
				$Conclusion24h=$row['Conclusion24h'];
				$Conclusion=$row['Conclusion'];
				
$this->InsertTodatabase($MeterNo,$Model,$Current,$Constant,$TEMP,$HUMIDITY,$TESTDATE,$Conclusion24h,$Conclusion);
				}
						
 		}
	}

function InsertTodatabase($MeterNo,$Model,$Current,$Constant,$TEMP,$HUMIDITY,$TESTDATE,$Conclusion24h,$Conclusion)
{
	$FO ="MDB";
	
		$testresults = new testResult;
						$testresults->_meterNo = $MeterNo;
						$testresults->_current = $Current;
						$testresults->_constant = $Constant;
						$testresults->_model = $Model;
						$testresults->_temp = $TEMP;
						$testresults->_conclusion24h = $Conclusion24h;
						$testresults->_conclusion = $Conclusion;
						$testresults->_FirstOrigin =$FO;
						$testresults->_testdate=$TESTDATE;
						$testresults->save();
echo "Success";
}

}

