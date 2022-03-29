<?php

namespace App\Http\Controllers;

use App\pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function showpesan()
    {
        return view('admin.pesanan.index',[
            'dtpesan' => pesanan::with('meja','menupesan')->latest()->get(),
        ]);
    }
    
    public function hapuspesan($id){
        pesanan::destroy($id);
        return redirect('/admin/datapesan');
    }
}
