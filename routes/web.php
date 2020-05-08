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


Route::middleware('verified')->group(function() {
    Route::resource('/statuses', 'StatusController');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admin','AdminController@index')->name('admin');

    Route::get('/profile','AccountController@edit')->name('account.edit');
    Route::patch('/profile', 'AccountController@update')->name('account.update');

});
