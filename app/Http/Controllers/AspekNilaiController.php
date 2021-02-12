<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use App\AspekNilai;
use Auth;

class AspekNilaiController extends Controller
{
    public function index($id)
      {
        if (Auth::check() && Auth::user()->role == 1)
        {
          $bidang = Bidang::find($id);
          if(request()->ajax())
            {
                return datatables()->of(AspekNilai::where('bidang_id', $bidang->id)->orderBy('id','asc'))
                        ->make(true);
            }
          return view('admin.aspeknilai.index', compact('bidang'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
      }
      

      public function store(Request $request, $id)
      {
          $bidang = Bidang::find($id);
          $this->validate($request, [
              'judul' => 'required',
              'rentang' => 'required',
              'persentase' => 'required',
          ]);
          AspekNilai::create([
            'judul' => $request->judul,
            'rentang' => $request->rentang,
            'persentase' => $request->persentase,
            'bidang_id' => $request->bidang_id,
            //'gambarkategori' => $image,
          ]);
      return redirect()->route('bidang.aspek_nilai', $bidang->id);
      }

      public function edit($id, AspekNilai $nilai)
      {
        if (Auth::check() && Auth::user()->role == 1)
        {
          $bidang = Bidang::find($id);
          $aspek = $nilai;
          return view('admin.aspeknilai.edit', compact('bidang', 'aspek'));
        }
        else
        {
            return redirect()->route('welcome')->with('noakses', 'Anda tidak memiliki akses');
        }

          
      }

      public function update(Request $request, $id, AspekNilai $nilai)
      {
        $bidang = Bidang::find($id);
          
          $this->validate($request, [
            'judul' => 'required',
              'rentang' => 'required',
              'persentase' => 'required',
          ]);
          
          $aspek = $nilai;
              $aspek->update([
                'judul' => $request->judul,
            'rentang' => $request->rentang,
            'persentase' => $request->persentase,
              ]);
  
          return redirect()->route('bidang.aspek_nilai', $bidang->id);
      }
 

      public function destroy($id, AspekNilai $nilai)
      {
        $bidang = Bidang::find($id);
        $aspek = $nilai;
          if (!$aspek) {
              return redirect()->back();
          }
          
          $aspek->delete();
          return redirect()->route('bidang.aspek_nilai', $bidang->id);
      }
}
