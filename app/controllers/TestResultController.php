<?php

class TestResultController extends BaseController {

	protected $layout = 'layouts.master';

	public function showResults()
	{
		$querydate = array(
			'dateFrom' 	=> Input::get('dateFrom'),
			'dateTo'	=> Input::get('dateTo'));

		try
		{

			$testResults = TestResult::where('_testdate', '>=', $querydate['dateFrom'])
		  	->where('_testdate', '<=', $querydate['dateTo'])
		  	->paginate(10);

		  	$rowCount = TestResult::where('_testdate', '>=', $querydate['dateFrom'])
		  	->where('_testdate', '<=', $querydate['dateTo'])
		  	->count();	
		}
		catch(exception $e)
		{
			$testResults = TestResult::where('_testdate', '>=', date('Y-m-d'))
		  	->where('_testdate', '<=', date('Y-m-d'))
		  	->paginate(10);

		  	$rowCount = 0;
		}

		$inputDate = $this->setInputDate();
		$this->layout->content = View::make('testResult.viewResults')
			->with('testResults', $testResults)
			->with('rowCount', $rowCount)
			->with('inputDate', $inputDate);
	}

	public function setInputDate()
	{
		if(Input::get('dateFrom') === NULL && Input::get('dateTo') === NULL)
		{
			$today = date('Y-m-d');
			return array ($today, $today);
		}
		else
		{
			return array(Input::get('dateFrom'), Input::get('dateTo'));
		}
	}

	public function createTestResultsList()
	{
		$fileName = 'TestResults_'.Input::get('dateFrom').'_'.Input::get('dateTo').'_'.date("Y_m_d_His");
		$dateCreated = date('Y/m/d h:i A');
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

}

