@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Edit Transporter person.</a></h2>         
      </div>    
	<div class="span6" style="background-color:#fff;">
	
	{{Form::open(['url'=>'admin/courriers/transporters/'.$transporter->id,'method'=>'PUT'])}}
	
		@include('transporters.form',['button'=>'Change Transporter'])

	{{Form::close()}}
	</div>


</div>
@stop