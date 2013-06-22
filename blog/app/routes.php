<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Home
Route::get('/',  array('as' => 'home', 'uses' => 'HomeController@getIndex'));

// News
Route::get('novosti/{id?}/{title?}',  array('as' => 'news', 'uses' => 'NewsController@getIndex'))
	->where('id', '[0-9]+')
	->where('title', '[a-zA-Z0-9\-]*');//[a-zA-Z0-9\~\!\@\#\$\%\^\&\*\(\)_\-\=\+\\\/\?\.\:\;\'\,]*

// Subjects
Route::get('predmeti',  array('as' => 'subjects', 'uses' => 'SubjectsController@getIndex'));

// Forum
Route::get('forum',  array('as' => 'forum', 'uses' => 'ForumController@getIndex'));

// Calendar
Route::get('kalendar',  array('as' => 'calendar', 'uses' => 'CalendarController@getIndex'));

// Contact
Route::get('kontakt',  array('as' => 'contact', 'uses' => 'ContactController@getIndex'));




Route::get('login', function()
{
	return View::make('user.login');
});

Route::post('login', function() {
	 // get POST data
	$userdata = array(
		 'username' => Input::get('username'),
		 'password' => Input::get('password')
	 );
	 if ( Auth::attempt($userdata) )
	 {
	 // we are now logged in, go to home
		 return Redirect::to('dashboard');
	 }
	 else
	 {
		 // auth failure! lets go back to the login
		 return Redirect::to('login')
		 ->with('login_errors', true);
		 // pass any error notification you want
		 // i like to do it this way :)
	 }
});

Route::get('logout',function(){
	Auth::logout();
});

Route::get('dashboard', function()
{
	echo "welcome to dashboard ". Auth::user()->username;
});

