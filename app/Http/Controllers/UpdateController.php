<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;

class UpdateController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function edit()
    {
        $user=Auth::user();

        return view('overview', compact('user'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'kvk_number'=>['required','integer','digits:8'],
            'organisation' => ['required', 'string', 'max:255'],
            'accommodation'=>['nullable', 'string','max:255'],
            'max_capacity' => ['required', 'integer', 'min:0'],
        ]);

        Auth::user()->update($validated);

        return redirect('home')
            ->with('success', __("Your settings are updated"));
    }
}
