<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karya;
use Storage;

class KaryaController extends Controller
{
    public function create()
    {
        return view('finalis.karya.create');
    }

    public function store(Request $request)
     {
        $this->validate($request, [
            'nama_karya' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'meeting' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png,jpg,JPG',
            
        ]);
        if (empty($request->file('poster'))) {
            if (empty($request->file('thumbnail'))) {
                Karya::create([
                  'nama_karya' => $request->nama_karya,
                  'deskripsi' => $request->deskripsi,
                  'meeting' => $request->meeting,
                  'video' => $request->video,
                  'profil_id' => cekTimID(auth()->user()->id),
                ]);
            } else {
                Karya::create([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'meeting' => $request->meeting,
                    'video' => $request->video,
                    'thumbnail' => $request->file('thumbnail')->store('karya'),
                    'profil_id' => cekTimID(auth()->user()->id),
                        
                    ]);
            }
        }
        else{
            if (empty($request->file('thumbnail'))) {
                Karya::create([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'video' => $request->video,
                    'meeting' => $request->meeting,
                    'poster' => $request->file('poster')->store('poster'),
                    'profil_id' => cekTimID(auth()->user()->id),
                ]);
            } else {
                Karya::create([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'video' => $request->video,
                    'meeting' => $request->meeting,
                    'poster' => $request->file('poster')->store('poster'),
                    'thumbnail' => $request->file('thumbnail')->store('karya'),
                    'profil_id' => cekTimID(auth()->user()->id),
                    ]);
            }
        }

      
       return redirect()->route('dashboard');
     }

     public function edit($id)
    {
        $karya = Karya::find($id);
        return view('finalis.karya.edit', compact('karya'));
    }

    public function update(Request $request, $id)
     {
        $this->validate($request, [
            'nama_karya' => 'required',
            'deskripsi' => 'required',
            'video' => 'required',
            'meeting' => 'required',
            'thumbnail' => 'mimes:jpeg,bmp,png,jpg,JPG',
            
        ]);
        if (empty($request->file('poster'))) {
            if (empty($request->file('thumbnail'))) {
                $karya = Karya::find($id);
                $karya->update([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'video' => $request->video,
                    'meeting' => $request->meeting,
                ]);
            } else {
                $karya = Karya::find($id);
                Storage::delete($karya->thumbnail);
                $karya->update([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'meeting' => $request->meeting,
                    'video' => $request->video,
                    'thumbnail' => $request->file('thumbnail')->store('karya'),
                ]);
            }
        }
        else{
            if (empty($request->file('thumbnail'))) {
                $karya = Karya::find($id);
                Storage::delete($karya->poster);
                $karya->update([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'video' => $request->video,
                    'meeting' => $request->meeting,
                    'poster' => $request->file('poster')->store('poster'),
                ]);
            } else {
                $karya = Karya::find($id);
                Storage::delete($karya->thumbnail);
                Storage::delete($karya->poster);
                $karya->update([
                    'nama_karya' => $request->nama_karya,
                    'deskripsi' => $request->deskripsi,
                    'video' => $request->video,
                    'meeting' => $request->meeting,
                    'poster' => $request->file('poster')->store('poster'),
                    'thumbnail' => $request->file('thumbnail')->store('karya'),
                ]);
            }
        }
       return redirect()->route('dashboard');
     }
}
