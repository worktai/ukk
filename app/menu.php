<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\menupesan;
use App\kategori;
class menu extends Model
{
    // use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['foto','nama_menu','harga','kategori_id'];


    public function kategori()
    {
        return $this->belongsTo(kategori::class,'kategori_id');
    }
    public function menupesan()
    {
        return $this->hasMany(menupesan::class);
    }
}
