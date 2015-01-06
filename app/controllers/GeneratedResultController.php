<?php

class GeneratedResultController extends BaseController {

	protected $layout = 'layouts.master';

	public function showGeneratedReport()
	{
		$this->layout->content = View::make('generatedResult.viewGeneratedResults');
	}
}