<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AccController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 2)
        {
            
            $akun = User::where('id', auth()->user()->id)->first();
            return view('finalis.account.index',compact('akun'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
    }

    public function store(Request $request)
    {
        
        if (empty($request->password)) {
            $akun = User::where('id', auth()->user()->id)->first();
            $akun->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $akun = User::where('id', auth()->user()->id)->first();
            $akun->update([
                'name' => $request->name,
                'email' => $request->email,
                
                'password' => bcrypt($request->password),
            ]);
        }

    	return redirect('/')->with(Auth::logout());
    }
}
