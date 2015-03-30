@extends('layouts.default')
@section('content')

<div class="row">
  <div class="hero-features-left col-md-6">
             <img src="{{ Lang::get('courriers.home_banner')}}" style="width:100%;padding-top:0px;">
  </div>

  <div class="col-md-6 pull-right">
  <div class="panel panel-primary" style="border:1px solid #ccc; ">
    <div class="panel-body">

    {{Form::open(['url'=>'courriers/customer'])}}
        @include('courriers.route')
         <div>
             {{ Form::submit(Lang::get('courriers.next_step'), ['class'=>'btn btn-success'])}}
         </div>
         <br>
         <br/>
         <br/>
    {{ Form::close()}}       
    </div>
</div>
</div>
</div>

@stop