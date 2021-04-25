<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakar_Syarat extends Model
{
    protected $table = 'pakar_syarat';
    protected $guarded = [];

    public function pakar()
    {
      return $this->belongsTo(Pakar::class);
    }

}
