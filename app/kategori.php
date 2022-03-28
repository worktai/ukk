<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\menu;

class kategori extends Model
{
    // use HasFactory;
    protected $guarded = [];

    public function menu(){
        return $this->hasMany(menu::class);
    }
}
