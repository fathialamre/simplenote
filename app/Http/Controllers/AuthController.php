<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * @param \Illuminate\Http\Request $request
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
            'error' => __('forms.incorrect-password-email'),
        ];
        return view('auth/login')->with($data);
    }

    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ];

        $messages = [
        ];

        $this->validate($request, $rules, $messages);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mid_name = '';
        $user->email = $request->email;
        $user->active = true;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('home');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
