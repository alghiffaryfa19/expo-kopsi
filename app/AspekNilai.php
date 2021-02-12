<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspekNilai extends Model
{
    protected $table='aspek_nilais';
    protected $guarded= ['id'];

    public function bidang()
    {
        return $this->belongsTo(\App\Bidang::class, 'bidang_id','id');
    }
}
