@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">areas lists <a href="{{route('admin.areas.create')}}" class="btn btn-success"> Add area</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($areas) > 0)
   {{ $areas->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>ID 	</th>
              <th>Name</th>
              <th>City</th>
              <th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($areas as $area)
			<tr>
            <td>{{ $area->id }} </td>
            <td>{{ $area->name }} </td>
            <td>{{ $area->city ?$area->city->name :'N/A'}}</td>
            <td>
          

           {{ Form::open(['route'=>['admin.areas.destroy',$area->id],'method'=>'DELETE' ]) }}
            <a href="{{route('admin.areas.edit',$area->id)}}" class="btn btn-info">Edit </a>
            	<button href="{{route('admin.areas.destroy',$area->id)}}" onclick="return confirm('Do you really want to delete this area? this action cannot be undone');" class="btn btn-danger">Delete</button>
		   {{ Form::close() }}

           </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $areas->links()}}
	@else
	No area available at the moment
	@endif
	</div>
</div>
@stop