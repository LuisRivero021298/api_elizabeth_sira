<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class CategoryService extends Model
{
    protected $fillable = ['name_category','description_category'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
