@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Add new courrier route</a></h2>         
      </div>    
	<div class="span6" style="background-color:#fff;">
	
	{{Form::open(['route'=>'admin.courriers.routes.store'])}}
	
		@include('courrierroutes.form')

		@include('courrierroutes.otherDetails',['button'=>'Create Courrier Route'])

	{{Form::close()}}
	</div>


</div>
@stop