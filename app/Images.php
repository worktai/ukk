<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'image';
    protected $primaryKey = 'images_id';
}
