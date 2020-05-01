<?php

use App\Post;
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
    if (Auth::user())
        return redirect('/home');
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Resource routes of the base pages. For more info on Resource Routes
Route::resource('/statuses', 'StatusController')->middleware('verified');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
//Route::get('auth/login','Auth\LoginController@index')->name('login');
Route::get('auth/register','Auth\RegisterController@index')->name('register');
Route::get('auth/register','Auth\RegisterController@create');
Route::post('auth/register', 'Auth\RegisterController@store');
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/overview ','UpdateController@edit')->name('overview');
Route::patch('/overview', 'UpdateController@update')->name('update');