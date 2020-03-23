<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Take the 3 newest posts
        $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();
        $current_date = Carbon::now();
        return view('home', compact('latestPosts', 'current_date'));
    }
}
