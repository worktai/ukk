<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public $table ='menu';
    protected $primaryKey ='id_menu';
    protected $guarded = [];
}
