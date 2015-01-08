<?php

class GeneratedResultController extends BaseController {

	protected $layout = 'layouts.master';

	public function showGeneratedReport()
	{
		$files = GeneratedFile::all();
		$this->layout->content = View::make('generatedResult.viewGeneratedResults')
			->with('files', $files);
	}

	public function downloadResult()
	{

		var_dump(Input::get('filename'));
		//$file = storage_path().'\\exports\\'..'.csv';
		

		// $headers = array(
		// 	'Content-Type: application/csv',
		// 	);


		//return Response::download($file, 'TestResults_2001-01-08_2015-01-08_2015_01_08_165752.csv', $headers);
	}
}