@extends('layouts.master')

@section('titlebar')
MLI Test Extraction Tool
@stop

@section('content')

<!--HEADER-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				@if(Request::path() === "/")
				<li class="active"><a href="{{URL::action('TestResultController@showResults')}}">Dashboard</a></li>
				@else
				<li><a href="{{URL::action('TestResultController@showResults')}}">Dashboard</a></li> 
				@endif
				<li><a href="{{URL::action('GeneratedResultController@showGeneratedReport')}}">Generated Results</a></li>

			</ul>
			<form class="navbar-form navbar-left" role="search" action="{{URL::action('TestResultController@showResults')}}">
				<div class="form-group">
					<input type="date" name="dateFrom" class="form-control" id="get-datefrom-js" value="{{$inputDate[0]}}">
				</div>
				<div class="form-group">
					<input type="date" name="dateTo" class="form-control" id="get-dateto-js" value="{{$inputDate[1]}}">
				</div>
				<input type="submit" class="btn btn-default" value="View Results" id="btnViewResults">
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, Administrator! <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Logout</a></li>
						<li class="divider"></li>
						<li><a href="#">Settings</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<!--HEADER-END-->

<!--CONTENT-->
<div class="navbar"></div>
<div class="container-fluid">
	@if($testResults->count())
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok"></span>
				<span>Showing rows {{$count = $testResults->getFrom()}} - {{$count = $testResults->getFrom() + ($testResults->count() - 1)}} of {{$rowCount}}</span>
			</div>
		</div>
	</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-view">
				@if($testResults->count())
				<thead>
					<tr>
						<td><strong>MeterID</strong></td>
						<td><strong>MeterPlace</strong></td>
						<td><strong>SerialNo</strong></td>
						<td><strong>MeterNo</strong></td>
						<td><strong>ScanCode</strong></td>
						<td><strong>Model</strong></td>
						<td><strong>Voltage</strong></td>
						<td><strong>Current</strong></td>
						<td><strong>Precision</strong></td>
						<td><strong>WireModel</strong></td>
						<td><strong>Frequency</strong></td>
						<td><strong>SerialDate</strong></td>
						<td><strong>MadePlace</strong></td>
						<td><strong>TEMP</strong></td>
						<td><strong>HUMIDITY</strong></td>
						<td><strong>TESTER</strong></td>
						<td><strong>RETESTER</strong></td>
						<td><strong>MANAGE</strong></td>
						<td><strong>TESTDATE</strong></td>
						<td><strong>STARTEST</strong></td>
						<td><strong>HIDDENTEST</strong></td>
						<td><strong>StopTest</strong></td>
						<td><strong>StartCurrent</strong></td>
						<td><strong>Resistance</strong></td>
						<td><strong>PIEZO</strong></td>
						<td><strong>TESTYER</strong></td>
						<td><strong>TESTMON</strong></td>
						<td><strong>TESTDAY</strong></td>
						<td><strong>MINCURR</strong></td>
						<td><strong>WALKTEST</strong></td>
						<td><strong>STARTDEG</strong></td>
						<td><strong>ENDDEG</strong></td>
						<td><strong>CUNDUTOTAL</strong></td>
						<td><strong>CUNDUPEAK</strong></td>
						<td><strong>CUNDUVALEY</strong></td>
						<td><strong>PNO</strong></td>
						<td><strong>TNO</strong></td>
						<td><strong>TestUnit</strong></td>
						<td><strong>Smax</strong></td>
						<td><strong>ForConclusion</strong></td>
						<td><strong>AftConclusion</strong></td>
						<td><strong>Conclusion24h</strong></td>
						<td><strong>Conclusion</strong></td>
						<td><strong>Net</strong></td>
						<td><strong>StartTime</strong></td>
						<td><strong>HideTime</strong></td>
					</tr>
				</thead>
				<tbody>
					@foreach($testResults as $key => $value)
					<tr>
						<td >{{$value->_meterID}}</td>
						<td >{{$value->_meterPlace}}</td>
						<td >{{$value->_serialNo}}</td>
						<td >{{$value->_meterNo}}</td>
						<td >{{$value->_scanCode}}</td>
						<td >{{$value->_model}}</td>
						<td >{{$value->_voltage}}</td>
						<td >{{$value->_current}}</td>
						<td >{{$value->_precision}}</td>
						<td >{{$value->_wireModel}}</td>
						<td >{{$value->_frequency}}</td>
						<td >{{$value->_serialDate}}</td>
						<td >{{$value->_madePlace}}</td>
						<td >{{$value->_temp}}</td>
						<td >{{$value->_humidity}}</td>
						<td >{{$value->_tester}}</td>
						<td >{{$value->_retester}}</td>
						<td >{{$value->_manage}}</td>
						<td >{{$value->_testDate}}</td>
						<td >{{$value->_starTest}}</td>
						<td >{{$value->_hiddenTest}}</td>
						<td >{{$value->_stopTest}}</td>
						<td >{{$value->_startCurrent}}</td>
						<td >{{$value->_resistance}}</td>
						<td >{{$value->_piezo}}</td>
						<td >{{$value->_testYer}}</td>
						<td >{{$value->_testMon}}</td>
						<td >{{$value->_testDay}}</td>
						<td >{{$value->_minCurr}}</td>
						<td >{{$value->_walkTest}}</td>
						<td >{{$value->_startDeg}}</td>
						<td >{{$value->_endDeg}}</td>
						<td >{{$value->_cunduTotal}}</td>
						<td >{{$value->_cunduPeak}}</td>
						<td >{{$value->_cunduValey}}</td>
						<td >{{$value->_PNO}}</td>
						<td >{{$value->_TNO}}</td>
						<td >{{$value->_testUnit}}</td>
						<td >{{$value->_sMax}}</td>
						<td >{{$value->_forConclusion}}</td>
						<td >{{$value->_aftConclusion}}</td>
						<td >{{$value->_conclusion24h}}</td>
						<td >{{$value->_conclusion}}</td>
						<td >{{$value->_net}}</td>
						<td >{{$value->_startTime}}</td>
						<td >{{$value->_hideTime}}</td>
					</tr>
					@endforeach
				</tbody>
				@else
				There are no results.
				@endif
			</table>
		</div>
	</div>
</div>
<!--CONTENT-END-->

<!--FOOTER-->
<div class="navbar"></div>
@if($testResults->count())
<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li>	
				<div class="navbar-form navbar-left">{{$testResults->appends(Input::except('page'))->links()}}</div>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right"></ul>
		{{Form::open(array('action' => 'TestResultController@createTestResultsList', 'class' => 'navbar-form navbar-right'))}}
		{{Form::submit('Generate Report', array('class' => 'btn btn-primary'))}}
		{{Form::close()}}
	</div><!-- /.navbar-collapse -->
</div>
@endif
@stop
<!--FOOTER-END-->
