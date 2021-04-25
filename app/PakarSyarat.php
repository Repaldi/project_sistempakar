<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakarSyarat extends Model
{
    protected $table = 'pakar_syarat';
    protected $guarded = [];

    public function pakar()
    {
      return $this->belongsTo(Pakar::class);
    }

}
