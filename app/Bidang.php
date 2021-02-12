<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bidang extends Model
{
    protected $table='bidangs';
    protected $guarded= ['id'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function juri()
    {
        return $this->hasMany(\App\Juri::class, 'bidang_id','id');
    }

    public function profil()
    {
        return $this->hasMany(\App\Profil::class, 'bidang_id','id');
    }

    public function karya()
    {
        return $this->hasMany(\App\Karya::class, 'bidang_id','id');
    }
}
