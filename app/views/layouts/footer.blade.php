<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
         </ul>
         <form id="generateReport" method="POST"class="navbar-form navbar-right" role="search" action="{{URL::action('TestResultController@createCSV')}}">
              <input type="hidden" name="empty" value="0">
              <input type="submit" class="btn btn-primary" value="Generate Report">
         </form>
      </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
</nav>