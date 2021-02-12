<?php

use App\User;
use App\Profil;
use App\Karya;
use App\Nilai;

function cekAkun($id)
{
	return $cek = User::where('id',$id)->exists();
}

function cekTim($id)
{
	return $cek = Profil::where('user_id',$id)->exists();
}

function cekTimID($id)
{
    $cek = Profil::where('user_id',$id)->first();
    return $cek['id'];
}

function cekKarya($id)
{
	return $cek = Karya::where('profil_id',cekTimID($id))->exists();
}

function cekKaryaID($id)
{
    $cek = Karya::where('profil_id',cekTimID($id))->first();
    return $cek['id'];
}
