<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table='profils';
    protected $guarded= ['id'];

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function bidang()
    {
        return $this->belongsTo(\App\Bidang::class, 'bidang_id','id');
    }

    public function karya()
    {
        return $this->hasOne(\App\Karya::class, 'profil_id','id');
    }
}
