<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Datatables;

class DashboardController extends Controller
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
        $data = User::all();
        return view('dashboard', ['data' => $data]);
        // return view('dashboard');
    }

    // public function getdata()
    // {
    //     $data = User::all();
    //     return Datatables::of($data)->make(true)
    // }
}
