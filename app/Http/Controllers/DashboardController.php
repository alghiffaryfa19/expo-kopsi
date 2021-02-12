<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class DashboardController extends Controller
{
    public function index()
    {
      
        if (Auth::check() && Auth::user()->role == 1) {
            return view('auth.admin');
          } else if (Auth::check() && Auth::user()->role == 2){
            return view('auth.peserta');
          } else if (Auth::check() && Auth::user()->role == 3){
            return view('auth.juri');
          } else if (Auth::check() && Auth::user()->role == 4){
            return redirect()->route('frontend');
          }
    }
}
