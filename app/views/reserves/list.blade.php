@extends(Config::get('Sentinel::config.layout'))
@section('content')
<div class="row">
	<div class="span12">
        <h2 class="header2">Reservation lists</h2>        
      </div>    
	  <div class="span12" style="background-color:#fff;">
    <div class="pull-left">
         {{ $reserves->links()}}

    </div>
   <form class="col-md-4 pull-right">
    <div class="form-group">
           <input name="search" class="form-control" placeholder="Type names, Telephone or Email to search">
    </div>
   </form>
  	<table class="table table-striped confirm-table">
		<thead>
			<tr>
              <th>Done at</th>
              <th>Names</th>
              <th>Departure</th>
              <th>Email</th>
              <th>Price</th>
              <th>Payable</th>
              <th>Telephone</th>
              <th>Start</th>
              <th>End</th>
              <th>Company</th>
              <th>Travellers</th>
              <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reserves as $reserve)
      <form action="{{Url()}}/admin/approve/{{$reserve->id}}/{{$reserve->approved}}">
			<tr>
              <td>{{ $reserve->created_at; }}</td>
              <td>{{ $reserve->names; }}</td>
              <td>{{ $reserve->date; }} {{ $reserve->time; }}</td>
              <td>{{ $reserve->email; }}</td>
              <td>{{ $reserve->price; }}</td>
              <td>{{ $reserve->totalprice; }}</td>
              <td>{{ $reserve->telephone; }}</td>
              <td>{{ $reserve->start_route; }}</td>
              <td>{{ $reserve->end_route; }}</td>
              <td>{{ $reserve->travelling_company; }}</td>
              <td>{{ $reserve->count_seat ; }}</td>
              <td>
                <?php $status = $reserve->approved; ?>
                <div class="label <?php if($status==1) : echo 'label-success';  elseif($status==0): echo 'label-warning'; elseif($status==2): echo 'label-danger'; endif;  ?>">
                {{ Form::select('status',[0 => 'Pending',
                                          1 => 'Approved',
                                          2 => 'Rejected'
                                          ],(int) $reserve->approved,
                                ['onchange' => 'this.form.submit()',
                                ])}}
                </div>
            </td>
			</tr>
    </form>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@stop