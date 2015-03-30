@extends('layouts.default')
@section('content')

<div class="row">
<p class="intro">{{ Lang::get('courriers.tell_us_who_are_and_who_you_are_sending_courrier_to')}}</p>
 {{ Form::open(['url'=>'courriers/preconfirm'])}}
  <div class="col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">{{ Lang::get('courriers.sender_details')}}</div>
        <div class="panel-body form-horizontal">
          <!--Load customer form -->
             @include('customers.form',['type'=>'sender.','customer'=> new Customer])
            </div>
        </div>
    </div>

<div class="col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">{{ Lang::get('courriers.receiver_details')}}</div>
        <div class="panel-body form-horizontal">
                <!--Load customer form -->
                @include('customers.form',['type'=>'receiver.','customer'=> new Customer])
      
            </div>
        </div>
</div>
  
  <div class="col-md-12 ">
      @include('courriers.otherdetails')
</div>

  <div class="col-md-12 pull-right">
    {{Form::submit(Lang::get('courriers.next_step'), ['class' =>'btn btn-success'])}}
  </div>
 {{ Form::close()}}
</div>
@stop