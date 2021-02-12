<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Auth;
use App\Bidang;

class ProfilPesertaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            if(request()->ajax())
            {
            return datatables()->of(Profil::query()->with('bidang')->select('profils.*'))
            ->make(true);
            }
            return view('admin.profil.peserta.index');
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }
    }

    public function edit($id)
    {
        $bidang = Bidang::all();
        $profil = Profil::find($id);
        return view('admin.profil.peserta.edit', compact('profil','bidang'));
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

        return redirect()->route('profil-peserta.index');
      }
 
      public function destroy($id)
      {
        $profil = Profil::find($id);
        if (!$profil) {
            return redirect()->back();
        }
        $profil->delete();
        return redirect()->route('profil-peserta.index');
      }
}
