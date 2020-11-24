<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }
    /**
    * Handle an authentication attempt.
    *
    * @param  \Illuminate\Http\Request $request
    *
    * @return Response
    */
    public function authenticate(Request $request)
    {

//        return 'a';
        $rules = [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
        $messages = [
        ];

        $this->validate($request, $rules, $messages);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/home');
        }
        $data = [
            'error' =>  __('forms.incorrect-password-email'),
        ];
        return view('auth/login')->with($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
