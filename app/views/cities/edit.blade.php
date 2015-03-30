@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit City {{ $city->name }}
@stop

{{-- Content --}}
@section('content')
<h4> Edit {{ $city->name }} city</h4>
<div class="well">
  {{ Form::open(['route'=>['admin.cities.update',$city->id],'method'=>'PUT'])}}
	@include('cities.form',['button'=>'edit'])
  {{ Form::close() }}
</div>


@stop
