<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
     protected $table='juris';
    protected $guarded= ['id'];

    public function users()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function bidang()
    {
        return $this->belongsTo(\App\Bidang::class, 'bidang_id','id');
    }

    public function nilai()
    {
        return $this->hasMany(\App\Nilai::class, 'juri_id','id');
    }
}
