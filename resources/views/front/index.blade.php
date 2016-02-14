@extends('front.layouts.default')

@section('title','Index')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Hello World</h1>
		<p>
			Hai, Welcome to my DevApp. lets signup here
			<a href="{{ route('signup') }}">Signup</a>
		</p>
	</div>
</div>
@endsection