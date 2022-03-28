<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\menupesan;
use App\meja;

class pesanan extends Model
{
    use HasFactory;
    // protected $fillable = ['id','nama_pemesan','tgl_pesan','meja_id','Total'];

    public function meja(){
        return $this->belongsTo(meja::class,'meja_id');
    }
    public function menupesan(){
        return $this->hasMany(menupesan::class);
    }
}
