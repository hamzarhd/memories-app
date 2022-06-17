<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('registerUser', ['as' => 'users.register', 'uses' => 'UserController@AddUser']);
Route::post('registerUser', ['as' => 'users.register', 'uses' => 'UserController@RegisterUser']);


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
   
    Route::put('userupdate', ['as' => 'user.update', 'uses' => 'UserController@update']);
    Route::put('user_password', ['as' => 'user.password', 'uses' => 'UserController@password']);

    Route::resource('souvenirs', 'SouvenirController');
    Route::get('addSouvenir', ['as' => 'souvenirs.add_souvenir', 'uses' => 'SouvenirController@AddSouvenir']);
    Route::post('addSouvenir', ['as' => 'souvenirs.add_souvenir', 'uses' => 'SouvenirController@Save']);
    Route::get('ShowSouvenirImage/{id}',['as' => 'souvenirs.image', 'uses' =>'SouvenirController@ShowSouvenirImage']);
    Route::put('souvenir', ['as' => 'souvenirs.update', 'uses' => 'SouvenirController@update']);


    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


});

