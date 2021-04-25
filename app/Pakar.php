<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakar extends Model
{
    protected $table = 'pakar';
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function pakar_syarat() 
    {
    	return $this->hasOne(Pakar_Syarat::class);
    }
}
