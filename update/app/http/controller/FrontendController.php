<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use App\Karya;
use App\Profil;

class FrontendController extends Controller
{
    public function index()
    {
        $bidang = Bidang::all();
        $random = Karya::inRandomOrder()->limit(8)->get();
        return view('welcome', compact('bidang','random'));
    }

    public function cari(Request $request, $slug)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data

            $bidang = Bidang::where('slug',$slug)->first();
        $profil = Profil::with('karya')->where('bidang_id',$bidang->id)->where('sekolah','like',"%".$cari."%")->get();
 
    		// mengirim data pegawai ke view index
		return view('bidang',compact('bidang','profil'));
 
	}

    public function bidang($slug)
    {
        $bidang = Bidang::where('slug',$slug)->first();
        $profil = Profil::with('karya')->where('bidang_id',$bidang->id)->get();
        return view('bidang', compact('bidang','profil'));
    }

    public function bidangg($slug)
    {
        $bidang = Bidang::where('slug',$slug)->with('profil.karya')->first();
        return $bidang;
    }

    public function karya($slug,$id)
    {
        $karya = Karya::find($id);
        return view('karya', compact('karya'));
    }

    public function postPost(Request $request)
    {

        $this->validate($request, [
            'rate' => 'required',
            'review' => 'required',
            'jenis' => 'required',
            'instansi' => 'required',
        ]);
       
        $post = Karya::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->review = $request->review;
        $rating->jenis = $request->jenis;
        $rating->instansi = $request->instansi;
        $rating->user_id = auth()->user()->id;
        $post->ratings()->save($rating);
        return redirect()->route("detail-karya", [$request->slug,$request->id]);
    }

    public function ulasan($slug,$id)
    {
        $karya = Karya::find($id);
        $ulasan = \willvincent\Rateable\Rating::where('rateable_id',$id)->get();
        return view('ulasan', compact('ulasan','karya'));
    }

}
