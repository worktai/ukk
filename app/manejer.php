<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manejer extends Model
{
    public $table = 'manejer';
    protected $primaryKey = 'id_manejer';
    protected $guarded = [];
}
