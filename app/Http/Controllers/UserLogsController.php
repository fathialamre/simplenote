<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\UserLogs;
use Illuminate\Http\Request;

class UserLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $s = $request->input('s') ? $request->input('s') : '';
      $users_log = UserLogs::whereLike(['id', 'method', 'description', 'user.name', 'user.surname', 'user.user_email'], $s)->orderBy('id', 'DESC')->paginate(10);
      $data = [
        'users_log' => $users_log,
        's'=> $s
      ];
      return view('system.users-log.index')->with($data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLogs  $userLogs
     * @return \Illuminate\Http\Response
     */
    public function show(UserLogs $userLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLogs  $userLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLogs $userLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserLogs  $userLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLogs $userLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLogs  $userLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLogs $userLogs)
    {
        //
    }
}
