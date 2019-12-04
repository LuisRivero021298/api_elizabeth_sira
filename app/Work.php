<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Work extends Model
{
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
