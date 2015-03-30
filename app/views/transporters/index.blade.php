@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Reservation lists <a href="{{route('admin.courriers.transporters.create')}}" class="btn btn-success"> Add transporter</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($transporters) > 0)
   {{ $transporters->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
			  <th>Type</th>
              <th>Name  	</th>
              <th>NID  	</th>
              <th>Driving license   	</th>
              <th>Jacket Number  	</th>
              <th>Pone</th>
              <th>Alternative phone</th>
              <th>Location</th>
               <th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transporters as $transporter)
			<tr>
            <td>{{ $transporter->type }} </td>
            <td>{{ $transporter->name }} </td>
            <td>{{ $transporter->NID }} </td>
            <td>{{ $transporter->driving_license }} </td>
            <td>{{ $transporter->jacket_number }} </td>
            <td>{{ $transporter->phone }} </td>
            <td>{{ $transporter->alternative_phone }} </td>
            <td>{{ $transporter->location }} </td>
            <td>
           <a href="{{route('admin.courriers.transporters.edit',$transporter->id)}}" class="btn btn-info">Edit </a>
            	<a href="{{route('admin.courriers.transporters.destroy',$transporter->id)}}" onClick="return confirm('Do you really want to delete this transporter? this action cannot be undone');" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $transporters->links()}}
	@else
	No transporter available at the moment
	@endif
	</div>
</div>
@stop