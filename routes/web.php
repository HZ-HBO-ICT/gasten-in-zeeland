<?php

use App\Http\Middleware\IsAdmin;
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

// Routes for Registration, email verification and authentication
Auth::routes(['verify' => true]);

Route::resource('/statuses', 'StatusController')
    ->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home')
    ->middleware('verified');

Route::middleware(IsAdmin::class)->prefix('admin')->group(function (){

    Route::get('/','AdminController@index')->name('admin');
    Route::get('/statuses', 'AdminController@downloadStatusCsV')
        ->name('admin.statuses');
    Route::get('/verified_users','AdminController@verifiedUsers')
        ->name('admin.verified_users');
    Route::get('/unverified_users','AdminController@unverifiedUsers')
        ->name('admin.unverified_users');
    Route::delete('/unverified_users', 'AdminController@deleteUnverifiedUsers')
        ->name('admin.unverified_users.delete');

});

