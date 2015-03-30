@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Add new Transporter person.</a></h2>         
      </div>    
	<div class="span6" style="background-color:#fff;">
	
	{{Form::open(['route'=>'admin.courriers.transporters.store'])}}
	
		@include('transporters.form',['button'=>'create new transporter'])

	{{Form::close()}}
	</div>


</div>
@stop