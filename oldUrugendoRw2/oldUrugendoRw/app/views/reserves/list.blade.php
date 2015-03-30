@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Reservation lists</h2>        
      </div>    
	<div class="span12" style="background-color:#fff;">
{{ $reserves->links() }}
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>names</th>
              <th>date</th>
              <th>time</th>
              <th>email</th>
              <th>price</th>
              <th>totalprice</th>
              <th>telephone</th>
              <th>start_route</th>
              <th>end_route</th>
              <th>travelling_company</th>
              <th>count_seat</th>
              <th>Approved</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reserves as $reserve)
			<tr>
              <td>{{ $reserve->names; }}</td>
              <td>{{ $reserve->date; }}</td>
              <td>{{ $reserve->time; }}</td>
              <td>{{ $reserve->email; }}</td>
              <td>{{ $reserve->price; }}</td>
              <td>{{ $reserve->totalprice; }}</td>
              <td>{{ $reserve->telephone; }}</td>
              <td>{{ $reserve->start_route; }}</td>
              <td>{{ $reserve->end_route; }}</td>
              <td>{{ $reserve->travelling_company; }}</td>
              <td>{{ $reserve->count_seat ; }}</td>
              <td><a href="/admin/approve/{{ $reserve->id}}/{{ $reserve->approved}}" class="btn btn-{{ ($reserve->approved!=0)?'success':'danger'}}"> {{ ($reserve->approved!=0)?'Approved':'Not approved'}}
              </a></td>

			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@stop