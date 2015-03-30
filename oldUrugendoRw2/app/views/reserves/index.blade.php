@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-12 about">
        <h2 class="title text-center">Reba ko ibyo wujuje aribyo ubundi wemeze itike </h2>        
      </div>    
	<div class="col-md-6" style="text-align:left;">

	<table class="table table-striped confirm-table">
		<tbody>
			<tr><td>Amazina</td><td>{{ Session::get('reservation')['names']	}}</td></tr>
			<tr><td>Email</td><td>{{ Session::get('reservation')['email']	}}</td></tr>
			<tr><td>Telefone</td><td>{{ Session::get('reservation')['telephone']	}}</td></tr>
			<tr><td>Italiki</td><td>{{ Session::get('reservation')['date']	}}</td></tr>
			<tr><td>Igihe</td><td>{{ Session::get('reservation')['time']	}}</td></tr>
			<tr><td>Aho uva</td><td>{{ Session::get('reservation')['start_route']	}}</td></tr>
			<tr><td>Aho ujya</td><td>{{ Session::get('reservation')['end_route']	}}</td></tr>
			<tr><td>Companyi</td><td>{{ Session::get('reservation')['travelling_company']	}}</td></tr>
			<tr><td>Umubare w'abagenda</td><td>{{ Session::get('reservation')['count_seat']	}}</td></tr>
			<tr><td><strong>Igiciro cy'urugendo</strong></td>
				<td><strong>{{ number_format(Session::get('reservation')['price']	)}} Rwf</strong></td></tr>
			<tr><td><strong>Igiciro cy'urugendo</strong></td>
				<td><strong>{{200}} Rwf</td></tr>
			<tr><td><strong>Igiciro cya servise</strong></td>
				<td><strong>{{ number_format(Session::get('reservation')['totalprice'])	}} Rwf</strong></td></tr>

		</tbody>
	</table>
</div>
	<div class="col-md-6" style="text-align:left;">
    <h4 class="title text-center" style="font-size:22px;">Turaza kubahamagara tubamenyesha ko itike yanyu yabonetse , mubone kwishyura na Tigo cash:  </h4>
	<ol class="list-group">
       <li class="list-group-item">Kanda *500#</li>
       <li class="list-group-item">Hitamo 4 (Kwishyura)</li>
       <li class="list-group-item">Hitamo 2 (Kwishyura umucuruzi) </li>
       <li class="list-group-item">Shyiramo 1000 (Code y'umucuruzi) </li>
       <li class="list-group-item">Shyiramo umubare w'amafaranga </li>
       <li class="list-group-item">Shyiramo Umubare w'ibanga ubundi wemeze.</li>
     </ol>
	
	<a href="/book" class="btn btn-cta-secondary btn-lg  text-center" type="submit" onClick="return confirm('Twizeyeko ukanze ino button umaze kugenzura neza ibyo wasabye. niba utagenzuye ongera urebe neza');">
	Kanda hano wemeze itike 
    </a>
	</div>

</div>
@stop