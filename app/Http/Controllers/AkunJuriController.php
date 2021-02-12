<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Session;

class AkunJuriController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            if(request()->ajax())
            {
            return datatables()->of(User::where('role',3))
            ->make(true);
            }
            return view('admin.user.juri.index');
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
        
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'email'     =>  'required',
           
            'password'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        $form_data = array(
            'name'        =>  $request->name,
            'email'         =>  $request->email,
            
            'role'         =>  3,
            'password' => bcrypt($request->password),
        );

        User::create($form_data);

        return redirect()->route('akun-juri.index');
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            $peserta = User::find($id);
            return view('admin.user.juri.edit', compact('peserta'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
    }

    public function update(Request $request, $id)
    {
        if (empty($request->password)) {
            $peserta = User::find($id);
            $peserta->update([
                'name' => $request->name,
                
                'email' => $request->email,
            ]);
        } else {
            $peserta = User::find($id);
            $peserta->update([
                'name' => $request->name,
                
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }
        return redirect()->route('akun-juri.index');
    }

    public function destroy($id)
    {
        $peserta = User::find($id);
        if (!$peserta) {
            return redirect()->back();
        }
        $peserta->delete();
        return redirect()->route('akun-juri.index');
    }
}
