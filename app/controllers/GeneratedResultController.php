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
		
	}
}