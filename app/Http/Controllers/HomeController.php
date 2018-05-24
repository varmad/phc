<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (Auth::user()->hasRole('admin')) {
        //   echo "Yes you have admin role";
        // } else {
        //   echo "You don't have admin role";
        // }


        return view('home');
    }
}
