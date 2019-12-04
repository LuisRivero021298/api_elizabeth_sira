<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryService;
use App\Work;

class Service extends Model
{
    protected $fillable = ['name_service','description_service','category_id'];

    public function category()
    {
        return $this->belongsTo(CategoryService::class);
    }

    public function work(){
        return $this->hasMany(Work::class);
    }
}
