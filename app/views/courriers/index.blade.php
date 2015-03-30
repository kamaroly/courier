@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Courrier lists</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($courriers) > 0)
   {{ $courriers->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
			  <th>From area</th>
              <th>To Area  	</th>
              <th>Pickup date  	</th>
              <th>Pickup time 	</th>
              <th>Sender </th>
              <th>Reciever </th>
              <th>Transporter</th>
              <th>Price</th>
              <th>Type</th>
              <th>Status</th>
              <th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($courriers as $courrier)

			<tr>
            <td>{{ $courrier->fromArea->name }} </td>
            <td>{{ $courrier->toArea->name }} </td>
            <td>{{ date('d-m-Y',strtotime($courrier->pickup_date)) }} </td>
            <td>{{ $courrier->pickup_time }} </td>
            <td>
            	<a href="{{ route('admin.courriers.customers.show',$courrier->sender_id)}}"> {{$courrier->sender->names }} </a>
             </td>
            <td>
			     	<a href="{{ route('admin.courriers.customers.show',$courrier->receiver_id)}}"> 
             {{$courrier->receiver->names }} 
           </a>
            </td>
            <td>
            <form method="GET" action="{{ Url() }}/admin/courriers/{{ $courrier->id}}" accept-charset="UTF-8">
             {{Form::token()}}
           <div class="label {{ ($courrier->transporter)?'label-success':'label-warning'}}">
            {{ Form::select('transporter', $transporters, $courrier->transporter , ['onchange' => 'this.form.submit()']) }} 
          </div>
            {{ Form::close() }}
            </td>
         	 <td>{{ $courrier->price }} </td>
            <td>{{ $courrier->type }} </td>
            <td>
               <form method="GET" action="{{ Url() }}/admin/courriers/{{ $courrier->id}}" accept-charset="UTF-8">
               {{Form::token()}}
            
                <div class="label <?php if($courrier->status==1) : echo 'label-success';  elseif($courrier->status==0): echo 'label-warning'; elseif($courrier->status==2): echo 'label-danger'; endif;  ?>">
                {{ Form::select('status',[0 => 'Pending',
                                          1 => 'Approved',
                                          2 => 'Rejected',
                                          3 => 'Picked',
                                          4 => 'Delivered',
                                          
                                          ],(int) $courrier->status,
                                ['onchange' => 'this.form.submit()',
                                ])}}
                </div>
               {{ Form::close()}}
            </td>
            <td>
            {{Form::open(['route'=>['admin.courriers.destroy',$courrier->id],'method'=>'DELETE'])}}
             <a href="{{route('admin.courriers.edit',$courrier->id)}}" class="btn btn-info">Edit </a>
                <button href="{{route('admin.courriers.destroy',$courrier->id)}}" onClick="return confirm('Do you really want to delete this courrier? this action cannot be undone');" class="btn btn-danger">Delete</button>
            {{ Form::close()}}
          </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $courriers->links()}}
	@else
	No courrier available at the moment
	@endif
	</div>
</div>
@stop