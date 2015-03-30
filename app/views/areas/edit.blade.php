@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit area {{ $area->name }}
@stop

{{-- Content --}}
@section('content')
<h4> Edit {{ $area->name }} area</h4>
<div class="well">
  {{ Form::open(['route'=>['admin.areas.update',$area->id],'method'=>'PUT'])}}
	@include('areas.form',['button'=>'edit'])
  {{ Form::close() }}
</div>


@stop
