<div class="col-md-3">
    <div class="list-group">
		@if(Request::path() === "/")
			<a href="{{URL::action('TestResultController@showDashboard')}}" class="list-group-item active">Dashboard</a>
		@else
			<a href="{{URL::action('TestResultController@showDashboard')}}" class="list-group-item">Dashboard</a>	
		@endif
        
        @if(Request::path() === "generate")
        	<a href="{{URL::action('TestResultController@showGenerate')}}" class="list-group-item active">Generate Results</a>
		@else
			<a href="{{URL::action('TestResultController@showGenerate')}}" class="list-group-item">Generate Results</a>
		@endif
	</div> 
</div>
