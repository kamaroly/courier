@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="container">
<div class="row">
		<div class="span9">
        <h2 class="header2">courriers details.</a></h2>         
      </div> 
 <div class="hero-features-left col-md-6">

  <div class="panel panel-primary">
    <div class="panel-heading" style="background-color:#444;">{{ Lang::get('courriers.courrier_details')}}</div>
    <div class="panel-body">
  <div class="panel-body" style="font-size:14px;">
      
                 <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>{{Lang::get('courriers.from')}}</th>
                        <td>  
                          <div class="pull-left">
                      
                          <strong>{{Lang::get('courriers.city')}}</strong>  {{ Area::find($courrier->from_area)->city->name }}
                           </div>
                          <div class="pull-right">
                          <strong>{{ Lang::get('courriers.area')}}</strong> {{ Area::find($courrier->from_area)->name }}
                          </div>
                       </td>
                      </tr>
                       <tr>
                        <th>{{ Lang::get('courriers.to') }}</th>
                        <td>  
                          <div class="pull-left">
                      
                          <strong>{{Lang::get('courriers.city')}}</strong> {{ Area::find($courrier->to_area)->city->name }}
                           </div>
                          <div class="pull-right">
                          <strong>{{ Lang::get('courriers.area')}}</strong>{{ Area::find($courrier->to_area)->name }}
                          </div>
                       </td>
                      </tr>
                      <tr>
                        <th>{{ Lang::get('courriers.courrier_type') }}</th>
                        <td>{{ $courrier->type }}</td>
                      </tr>
                      <tr>
                        <tr>
                        <th>{{ Lang::get('courriers.pickup_date') }} </th>
                        <td>{{ $courrier->pickup_date }}</td>
                      </tr>
                      <tr>
                        <th>{{ Lang::get('courriers.pickup_time')}}</th>
                       <td>{{ $courrier->pickup_time }}</td>
                      </tr>
                       <tr>
                        <th>{{ Lang::get('courriers.other_details')}}</th>
                       <td>{{ $courrier->details }}</td>
                      </tr>
                     </tbody>
                  </table>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
            </div>  
                </div>
            </div>

    <div class="col-md-6">

    <div class="panel panel-primary">
       <div class="panel-heading">{{ Lang::get('courriers.sender_details')}}</div>
         <div class="panel-body form-horizontal">
           @include('courriers.customerShow',['type'=>'sender_','customer'=>Customer::find($courrier->sender_id)])
         </div>
  
         <div class="panel panel-success" >
       <div class="panel-heading" > {{ Lang::get('courriers.receiver_details') }}</div>
        <div class="panel-body form-horizontal">
        @include('courriers.customerShow',['type'=>'receiver_','customer'=>Customer::find($courrier->receiver_id)])

        </div>
    </div>
   </div>
</div>
</div>
</div>
