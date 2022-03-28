<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\pesanan;
use App\menu;

class menupesan extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['foto','nama_menu','harga','kategori_id'];

    public function pesanan(){
        return $this->belongsTo(pesanan::class);
    }

    public function menu(){
        return $this->belongsTo(menu::class);
    }
}
