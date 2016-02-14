@extends('front.layouts.default')

@section('title',trans('front.signup-title'))

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">{{ trans('front.signup-title') }}</h1>
	</div>
	<div class="col-md-12">
		@if (count($errors) > 0)
		    <div class="alert alert-danger" role="alert">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form action="{{ route('post.signup') }}" method="post">
		{{ csrf_field() }}
			<div class="form-group">
				<label for="email">{{trans('front.field-email')}} *</label>
				<input type="email" name="email" class="form-control" id="email" placeholder="{{trans('front.field-email-plc')}}">
			</div>
			<div class="form-group">
				<label for="password">{{trans('front.field-password')}} *</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="{{trans('front.field-password-plc')}}">
			</div>
			<div class="form-group">
				<label for="password_confimation">{{trans('front.field-repassword')}} *</label>
				<input type="password" name="password_confirmation" class="form-control" id="repassword" placeholder="{{trans('front.field-repassword-plc')}}">
			</div>
			<div class="form-group">
				<label for="name">{{trans('front.field-name')}} *</label>
				<input type="text" name="name" class="form-control" id="name" placeholder="{{trans('front.field-name-plc')}}">
			</div>
			<div class="form-group">
				<label for="phone">{{trans('front.field-phone')}} *</label>
				<input type="text" name="phone" class="form-control" id="phone" placeholder="{{trans('front.field-phone-plc')}}">
			</div>
			<div class="form-group">
				<label for="occupation">{{trans('front.field-occupation')}} *</label>
				<input type="text" name="occupation" class="form-control" id="occupation" placeholder="{{trans('front.field-occupation-plc')}}">
			</div>
			<div class="form-action">
				<button class="btn btn-success">{{trans('front.btn-submit')}}</button>
			</div>
		</form>
	</div>
</div>
@endsection