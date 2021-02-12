<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;

class Karya extends Model
{
    use Rateable;
    protected $table='karyas';
    protected $guarded= ['id'];

    public function profil()
    {
        return $this->belongsTo(\App\Profil::class, 'profil_id');
    }
}
