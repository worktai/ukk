<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    public $table = 'kasir';
    protected $primaryKey = 'id_kasir';
    protected $guarded = [];
}
