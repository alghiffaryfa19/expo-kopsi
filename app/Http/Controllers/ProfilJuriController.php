<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juri;
use App\User;
use App\Bidang;

class ProfilJuriController extends Controller
{
    public function index()
     {
         $user = User::where('role',3)->get();
         $bidang = Bidang::all();
         if(request()->ajax())
         {
             return datatables()->of(Juri::query()->with('users','bidang')->select('juris.*'))
                ->make(true);
         }
         return view('admin.profil.juri.index', compact('user','bidang'));
     }

     public function store(Request $request)
      {

        Juri::create([
            'user_id' => $request->user_id,
            'bidang_id' => $request->bidang_id,
          ]);
        return redirect()->route('profil-juri.index');
      }
 
      public function edit($id)
      {
        $user = User::where('role',3)->get();
        $bidang = Bidang::all();
          $profil = Juri::find($id);
          return view('admin.profil.juri.edit', compact('profil','user','bidang'));
      }
 
      public function update(Request $request, $id)
      {
        $profil = Juri::find($id);
        $profil->update([
            'user_id' => $request->user_id,
            'bidang_id' => $request->bidang_id,
        ]);

        return redirect()->route('profil-juri.index');
      }
 
      public function destroy($id)
      {
        $profil = Juri::find($id);
        if (!$profil) {
            return redirect()->back();
        }
        $profil->delete();
        return redirect()->route('profil-juri.index');
      }
}
