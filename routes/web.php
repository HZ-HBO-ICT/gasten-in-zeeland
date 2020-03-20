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
    // Take the 3 newest posts
    $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();

    return view('welcome', compact('latestPosts'));
});



// Resource routes of the base pages. For more info on Resource Routes
Route::resource('/posts', 'PostController');
Route::resource('/statuses', 'StatusController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
