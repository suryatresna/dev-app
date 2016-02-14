@extends('front.layouts.default')

@section('title',trans('front.login-title'))

@section('content')
<div class="row">
	<div class="col-md-12">
		<center>
		<h1>{{trans('front.signup-success-title')}}</h1>
		<p>{{session('message')}}</p>
		<p><a href="{{route('home')}}"> &lt;&lt; Back to homepage</a></p>
		</center>
	</div>
</div>
@endsection