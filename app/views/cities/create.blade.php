@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Add city
@stop

{{-- Content --}}
@section('content')
<h4> Add city</h4>
<div class="well">
  {{ Form::open(['route'=>'admin.cities.store'])}}
	@include('cities.form',['button'=>'Register'])
  {{ Form::close() }}
</div>


@stop
