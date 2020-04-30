<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusRequest;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStatusRequest $request)
    {
        $user = Auth::user();
        $item = $user->statuses()->create($request->validated());

        $count = $request->count;

        $status = 'success';
        $message = __('app.statuses.create.success');

        if ($request->count > $user->max_allowed) {
            $item->is_overcrowded = true;
            $item->save();
            $status = 'danger';
            $message .= '. '.__('There are too many guests in your establishment');
        }

        return redirect('home')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
