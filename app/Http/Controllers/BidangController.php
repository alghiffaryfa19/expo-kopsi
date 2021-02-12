<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;
use App\Bidang;
use Validator;
use File;

class BidangController extends Controller
{
    public function index()
     {
         if(request()->ajax())
         {
             return datatables()->of(Bidang::query())
                ->make(true);
         }
         return view('admin.bidang.index');
     }
 
      public function store(Request $request)
      {
        $this->validate($request, [
            'nama' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png,jpg,JPG',
            'stand' => 'mimes:jpeg,bmp,png,jpg,JPG',
        ]);
        if (empty($request->file('stand'))) {
            if (empty($request->file('thumbnail'))) {
                Bidang::create([
                  'nama' => $request->nama,
                 
                  'slug' => Str::slug($request->nama),
                ]);
            } else {
                Bidang::create([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                    'thumbnail' => $request->file('thumbnail')->store('bidang'),
                        
                    ]);
            }
        }
        else{
            if (empty($request->file('thumbnail'))) {
                Bidang::create([
                  'nama' => $request->nama,
                  'slug' => Str::slug($request->nama),
                  'stand' => $request->file('stand')->store('stand'),
                ]);
            } else {
                Bidang::create([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                    'thumbnail' => $request->file('thumbnail')->store('bidang'),
                    'stand' => $request->file('stand')->store('stand'),
                    ]);
            }
        }
        
        return redirect()->route('bidang.index');
      }
 
      public function edit($id)
      {
          $bidang = Bidang::find($id);
          return view('admin.bidang.edit', compact('bidang'));
      }
 
      public function update(Request $request, $id)
      {
        $this->validate($request, [
            'nama' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png,jpg,JPG',
            'stand' => 'mimes:jpeg,bmp,png,jpg,JPG',
        ]);
        if (empty($request->file('stand'))) {
            if (empty($request->file('thumbnail'))) {
                $bidang = Bidang::find($id);
                $bidang->update([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                ]);
            } else {
                $bidang = Bidang::find($id);
                Storage::delete($bidang->thumbnail);
                $bidang->update([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                    'thumbnail' => $request->file('thumbnail')->store('bidang'),
                ]);
            }
        }
        else{
            if (empty($request->file('thumbnail'))) {
                $bidang = Bidang::find($id);
                Storage::delete($bidang->stand);
                $bidang->update([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                    'stand' => $request->file('stand')->store('stand'),
                ]);
            } else {
                $bidang = Bidang::find($id);
                Storage::delete($bidang->thumbnail);
                Storage::delete($bidang->stand);
                $bidang->update([
                    'nama' => $request->nama,
                    'slug' => Str::slug($request->nama),
                    'thumbnail' => $request->file('thumbnail')->store('bidang'),
                    'stand' => $request->file('stand')->store('stand'),
                ]);
            }
        }
        

        return redirect()->route('bidang.index');
      }
 
      public function destroy($id)
      {
        $bidang = Bidang::find($id);
        if (!$bidang) {
            return redirect()->back();
        }
        Storage::delete($bidang->thumbnail);
        Storage::delete($bidang->stand);
        $bidang->delete();
        return redirect()->route('bidang.index');
      }
}
