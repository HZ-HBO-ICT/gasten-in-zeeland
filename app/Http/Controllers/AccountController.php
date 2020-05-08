<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Illuminate\Http\Response;

class AccountController extends Controller
{

    /**
     * Show the form for editing the authenticated user.
     *
     * @return Response
     */
    public function edit()
    {
        $user=Auth::user();

        return view('account.edit', compact('user'));
    }


    /**
     * Update the authenticated user in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'kvk_number'=>['required','string','digits:8'],
            'organisation' => ['required', 'string', 'max:255'],
            'accommodation'=>['nullable', 'string','max:255'],
            'max_capacity' => ['required', 'integer', 'min:0'],
        ]);

        Auth::user()->update($validated);

        return redirect('home')
            ->with('success', __("Your settings are updated"));
    }
}
