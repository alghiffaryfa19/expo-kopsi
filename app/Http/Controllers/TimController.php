<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use App\Profil;

class TimController extends Controller
{
    public function create()
    {
        $bidang = Bidang::all();
        return view('finalis.tim.create', compact('bidang'));
    }

    public function store(Request $request)
     {
       $this->validate($request, [
           'nama_ketua' => 'required',
           'nama_anggota' => 'required',
           'sekolah' => 'required',
           'alamat' => 'required',
          
       ]);

       Profil::create([
        'nama_ketua' => $request->nama_ketua,
        'nama_anggota' => $request->nama_anggota,
        'sekolah' => $request->sekolah,
        'alamat' => $request->alamat,
        'bidang_id' => $request->bidang_id,
        'user_id' => auth()->user()->id,
        ]);
       return redirect()->route('dashboard');
     }

     public function edit($id)
    {
        $bidang = Bidang::all();
        $profil = Profil::where('user_id',$id)->first();
        return view('finalis.tim.edit', compact('profil','bidang'));
    }

    public function update(Request $request, $id)
     {
       $this->validate($request, [
           'nama_ketua' => 'required',
           'nama_anggota' => 'required',
           'sekolah' => 'required',
           'alamat' => 'required',
          
       ]);

       $profil = Profil::find($id);
       $profil->update([
        'nama_ketua' => $request->nama_ketua,
        'nama_anggota' => $request->nama_anggota,
        'sekolah' => $request->sekolah,
        'alamat' => $request->alamat,
       
        'bidang_id' => $request->bidang_id,
       ]);
       return redirect()->route('dashboard');
     }
}
