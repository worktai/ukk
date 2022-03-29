<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\pesanan;

class meja extends Model
{
    // use HasFactory;
    protected $table ='mejas';
    protected $primaryKey='meja_id';
    protected $guarded = [];
    
    public function pesanan(){
        return $this->hasMany(pesanan::class);
    }
}
