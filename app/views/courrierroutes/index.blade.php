@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Reservation lists <a href="{{route('admin.courriers.routes.create')}}" class="btn btn-success"> Add courrierroute</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($courrierroutes) > 0)
   {{ $courrierroutes->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>Start Area   	</th>
              <th>End Area   	</th>
              <th>Fees   	</th>
              <th>Courrier Type   	</th>
               <th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($courrierroutes as $courrierroute)
			<tr>
            <td>{{ $courrierroute->fromArea->name }} </td>
            <td>{{ $courrierroute->toArea->name }} </td>
            <td>{{ $courrierroute->fees }} </td>
            <td>{{ $courrierroute->courrier_type }} </td>
            <td>
           <a href="{{route('admin.courriers.routes.edit',$courrierroute->id)}}" class="btn btn-info">Edit </a>
            	<a href="{{route('admin.courriers.routes.destroy',$courrierroute->id)}}" onClick="return confirm('Do you really want to delete this courrierroute? this action cannot be undone');" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $courrierroutes->links()}}
	@else
	No courrierroute available at the moment
	@endif
	</div>
</div>
@stop