@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Details for {{ $customer->names}}	</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   	 @include('customers.form',['type'=>'receiver.'])
	</div>
</div>
@stop