@extends('layouts.master')

@section('titlebar')
MLI Test Extraction Tool
@stop

@section('content')
@include('layouts.header')
<div class="container-fluid">
   <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4>Database Status</h4>
            </div>
            
            <div class="panel-body">
               <p><i>Database last update: December 2, 2014</i></p>
               <p><i>Machine Database modified: December 3, 2014</i></p> 
               <button type="button" class="btn btn-primary btn-lg">Update Database</button>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
