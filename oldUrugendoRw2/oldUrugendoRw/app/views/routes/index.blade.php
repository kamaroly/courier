@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Reservation lists <a href="/admin/routes/add" class="btn btn-success"> Add route</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($routes) > 0)
   {{ $routes->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>start_route   	</th>
              <th>end_route   	</th>
              <th>price   	</th>
              <th>numseats   	</th>
              <th>travelling_company   	</th>
              <th>time   	</th>
               <th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($routes as $route)
			<tr>
            <td>{{ $route->start_route }} </td>
            <td>{{ $route->end_route }} </td>
            <td>{{ $route->price }} </td>
            <td>{{ $route->numseats }} </td>
            <td>{{ $route->travelling_company }} </td>
            <td>{{ $route->time }} </td>
            <td>
<a href="/admin/routes/modify/{{$route->id}}" class="btn btn-info">Edit </a>
            	<a href="/admin/routes/remove/{{$route->id}}" onClick="return confirm('Do you really want to delete this route? this action cannot be undone');" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $routes->links()}}
	@else
	No route available at the moment
	@endif
	</div>
</div>
@stop