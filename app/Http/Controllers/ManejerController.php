<?php

namespace App\Http\Controllers;
use App\pesanan;
use Illuminate\Http\Request;

class ManejerController extends Controller
{
    public function laporantransaksi(Request $request)
    {
        $keyword =$request->search;
        $data =pesanan::where('nama_pegawai','like','%'.$keyword.'%')->get();
        //  dd($keyword);
       return view('manejer.note', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function caritgl(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        return view('manejer.note', ['data' => $data]);
    }
    public function tgltertentu(Request $request)
    {
        $keyword =$request->search;
        $data =pesanan::where('created_at','like','%'.$keyword.'%')->get();
       // dd($keyword);
       return view('manejer.note', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function laporharibulan(Request $request)
    {
       
       return view('manejer.laporharibulan');
    }

    
}
