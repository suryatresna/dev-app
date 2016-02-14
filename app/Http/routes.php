<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',[
	'as'	=> 'home',
	'uses'	=> 'FrontController@index'
]);

Route::get('/signup',[
	'as'	=> 'signup',
	'uses'	=> 'FrontController@signup'
]);

Route::post('/signup',[
	'as'	=> 'post.signup',
	'uses'	=> 'Api\MemberController@store'
]);

Route::get('/signup/success',[
	'as'	=> 'signup.success',
	'uses'	=> 'FrontController@confirmed'
]);

Route::get('/test/mail',[
	'as'	=> 'test.mail',
	'uses'	=> 'Api\MemberController@mail'
]);

Route::get('/test',function(){
	return "Hello";
});

