<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class UpdateController extends Controller
{
    public function index(){
        return view('user'); 
    }

    public function edit(){
        $user=Auth::user();
        //$user = User::find($id);
        return view('overview', compact('user'));
    }

    public function update(){

        
        
         $user->name = request('name');
         $user->email = request('email');
         $user->max_capacity = request('max_capacity');
         $user->organisation = request('organisation');
         $user->accommodation = request('accommodation');
         $user->kvk_number = request('kvk_number');
         $user->password = request('password');

         $user->save();
         return redirect('home');
        
    }
}