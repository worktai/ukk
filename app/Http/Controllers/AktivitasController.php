<?php

namespace App\Http\Controllers;
use App\kategori;
use App\meja;
use App\menu;
use App\pesanan;
use App\User;
use App\ActivityLog;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function aktivitas()
    {
        $user = User::select()->count();
        $meja = meja::select()->count();
        $menu = menu::select()->count();
        $pesanan = pesanan::select()->count();
        $kategori = kategori::select()->count();
        $activity_log= ActivityLog::with('user')->limit(50)->orderBy('id','DESC')->get();
        return view('admin.utama', compact('user','meja','menu','pesanan','kategori','activity_log'));
    }
}
