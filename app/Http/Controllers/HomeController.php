<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Department;
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
        $departments = Department::all();
        $ads = Ad::all();
        $data = [
            'ads' => $ads,
            'departments' => $departments,
        ];
        return view('welcome')->with($data);
    }
}
