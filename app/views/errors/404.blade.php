@extends('layouts.default')
@section('title')
Urugendo - 404
@stop
@section('content')
	<section style="padding-bottom:200px;padding-top:100px;">
		<h2 class="title">404 Error</h2>
		<p class="intro text-center">Ntago tubashije kubona i paji ya {{$url}} muri gushaka.</p>

       <a href="{{Url()}}" style="color: #F68300;
margin-top: 0;
margin-bottom: 10px;
font-size: 30px;
font-weight: 800;">Jya ahabanza</a>

	</section>
@stop

