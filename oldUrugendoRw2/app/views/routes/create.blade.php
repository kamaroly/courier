@extends(Config::get('Sentinel::config.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Route
@stop

{{-- Content --}}
@section('content')

<h4>
  @if($old)
  {{ $old['start_route'] }} - {{ $old['end_route'] }}
  @else
  Add
  @endif
  Route
</h4>
<div class="well">
  {{ Form::open(array(
        'url'    => URL::current(), 
        'method' => 'post',
        'class' => 'form-horizontal', 
        'role' => 'form'
        )) }}
        
        <div class="form-group {{ ($errors->has('start_route')) ? 'has-error' : '' }}" for="start_route">
            {{ Form::label('edit_start_route', 'Start Route', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('start_route', $old['start_route'], array('class' => 'form-control', 'placeholder' => 'Start route', 'id' => 'edit_start_route'))}}
            {{  $errors->first('start_route','<span class="has-error">:message</span>') }}          
            </div>
      </div>
      <div class="form-group {{ ($errors->has('end_route')) ? 'has-error' : '' }}" for="end_route">
            {{ Form::label('edit_end_route', 'End Route', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('end_route', $old['end_route'], array('class' => 'form-control', 'placeholder' => 'End route', 'id' => 'edit_end_route'))}}
            {{  $errors->first('end_route','<span class="has-error">:message</span>') }}          
            </div>
      </div>
          <div class="form-group {{ ($errors->has('price')) ? 'has-error' : '' }}" for="price">
            {{ Form::label('edit_price', 'Price', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('price', $old['price'], array('class' => 'form-control', 'placeholder' => 'Price', 'id' => 'edit_price'))}}
            {{  $errors->first('price','<span class="has-error">:message</span>') }}          
            </div>
      </div>
        <div class="form-group {{ ($errors->has('numseats')) ? 'has-error' : '' }}" for="numseats">
            {{ Form::label('edit_numseats', 'Number of Seats', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('numseats', $old['numseats'], array('class' => 'form-control', 'placeholder' => 'Number of seats', 'id' => 'edit_numseats'))}}
            {{  $errors->first('numseats','<span class="has-error">:message</span>') }}          
            </div>
      </div>
      
      <div class="form-group {{ ($errors->has('time')) ? 'has-error' : '' }}" for="time">
            {{ Form::label('edit_time', 'Travelling Time', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('time', $old['time'], array('class' => 'form-control', 'placeholder' => 'Departure time', 'id' => 'edit_time'))}}
            {{  $errors->first('time','<span class="has-error">:message</span>') }}          
            </div>
      </div>

     <div class="form-group {{ ($errors->has('travelling_company')) ? 'has-error' : '' }}" for="travelling_company">
            {{ Form::label('edit_travelling_company', 'Travelling Company name', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('travelling_company', $old['travelling_company'], array('class' => 'form-control', 'placeholder' => 'Travelling Company name', 'id' => 'edit_travelling_company'))}}
            {{  $errors->first('travelling_company','<span class="has-error">:message</span>') }}          
            </div>
      </div>

      
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                {{ Form::submit('Submit Changes', array('class' => 'btn btn-primary'))}}
            </div>
      </div>
    {{ Form::close()}}
</div>


@stop
