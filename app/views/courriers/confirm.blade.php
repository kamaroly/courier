@extends('layouts.default')
@section('content')

<div class="row">
  <div class="hero-features-left col-md-6">

  <div class="panel panel-primary">
    <div class="panel-heading" style="background-color:#444;">{{ Lang::get('courriers.courrier_details')}}</div>
    <div class="panel-body">

     @include('courriers.confirmTable')
      <br />
      <br />
      <br />
      <br />
      <br />
    </div>
  </div>
</div>

<div class="col-md-6 pull-right">

    <div class="panel panel-primary">
       <div class="panel-heading">{{ Lang::get('courriers.sender_details')}}</div>
         <div class="panel-body form-horizontal">
           @include('courriers.customerShow',['type'=>'sender_','customer'=>$sender])
         </div>
      {{Form::hidden('sender_id', $sender->id)}}
  
         <div class="panel panel-success" >
       <div class="panel-heading" > {{ Lang::get('courriers.receiver_details') }}</div>
        <div class="panel-body form-horizontal">
        @include('courriers.customerShow',['type'=>'receiver_','customer'=>$receiver])
        {{Form::hidden('receiver_id', $receiver->id)}}
        </div>
    </div>
   </div>

</div>

</div>

<div class="row">
    <div class="col-md-6">
      <strong>{{ Lang::get('courriers.service_fees')}} : {{ $routedata['price']}} Frw
    </div>
    <a href="{{ route('courriers.confirm') }}" class="btn btn-lg btn-primary">
    {{ Lang::get('courriers.confirm') }}
  </a>

    <div  class="btn btn-success " onclick="show('payment-method',this)" id="methodbutton" >{{ Lang::get('courriers.payment_method')}}
    </div>
   </div>

<div class="row">
  <div class="col-md-12">
   <div id="payment-method" style="display:none;background:#357ebd;color:#fff;margin-top:10px;">
       <div class="payment-method" >
       @include('courriers.paymentmethods')
     </div>
  </div>
  </div>

</div>

@stop