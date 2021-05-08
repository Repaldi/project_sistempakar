<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PakarSyarat;

class Pakar extends Model
{
    protected $table = 'pakar';
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function pakarsyarat() 
    {
    	return $this->hasOne(PakarSyarat::class,);
    }
}
