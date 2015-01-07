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
               <input type="date" name="dateFrom" class="form-control" id="get-datefrom-js" value="">
            </div>
            <div class="form-group">
               <input type="date" name="dateTo" class="form-control" id="get-dateto-js" value="">
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
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
      @if($files->count())
			<table class="table table-striped table-bordered table-download">
				<thead>
					<td><strong>Name</strong></td>
               <td><strong>Extension</strong></td>
					<td><strong>Date Created</strong></td>
					<td><strong>Created By</strong></td>
					<td><strong>Downloads</strong></td>
					<td></td>
				</thead>
            <tbody>
            @foreach($files as $key => $value)
            <tr>
               <td>{{$value->_fileName}}</td>
               <td>{{$value->_extension}}</td>
               <td>{{$value->_dateCreated}}</td>
               <td>{{$value->_createdBy}}</td>
               <td>{{$value->_downloads}}</td>
               <td><a href="{{URL::action(GeneratedResultController@downloadResult))}}"><span class="glyphicon glyphicon-download-alt"></span></a></td>
            </tr>
            @endforeach
            </tbody>
			</table>
      @endif
		</div>	
	</div>
</div>

<!--CONTENT-END-->

<!--FOOTER-->
@stop
<!--FOOTER-END-->
