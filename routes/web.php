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
    return view('welcome');
});



// Resource routes of the base pages. For more info on Resource Routes
Route::resource('/statuses', 'StatusController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
