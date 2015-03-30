@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Cities lists <a href="{{route('admin.cities.create')}}" class="btn btn-success"> Add citie</a></h2>         
      </div>    
	<div class="span12" style="background-color:#fff;">
   
   @if(count($cities) > 0)
   {{ $cities->links()}}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>ID 	</th>
              <th>Name</th>
              <th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cities as $citie)
			<tr>
            <td>{{ $citie->id }} </td>
            <td>{{ $citie->name }} </td>
            <td>
          

           {{ Form::open(['route'=>['admin.cities.destroy',$citie->id],'method'=>'DELETE' ]) }}
            <a href="{{route('admin.cities.edit',$citie->id)}}" class="btn btn-info">Edit </a>
            	<button href="{{route('admin.cities.destroy',$citie->id)}}" onclick="return confirm('Do you really want to delete this citie? this action cannot be undone');" class="btn btn-danger">Delete</button>
		   {{ Form::close() }}

           </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	   {{ $cities->links()}}
	@else
	No citie available at the moment
	@endif
	</div>
</div>
@stop