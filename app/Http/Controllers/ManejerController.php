<?php

namespace App\Http\Controllers;
use App\pesanan;
use Illuminate\Http\Request;

class ManejerController extends Controller
{
    public function laporantransaksi(Request $request)
    {
        
        if($request->date)
        {
            $data = pesanan::where('created_at', 'like', '%'.$request->date.'%')->get();
        } elseif($request->cari)
        {
            $data = pesanan::where('nama_pegawai', 'like', '%'.$request->cari.'%')->get();

        }
        else{
            $from = $request->from;
             $to = $request->to;
            $data = pesanan::paginate();
        }

        // dd($data);
        return view('manejer.note',compact('request'), ['data' => $data]);
    }
    public function haribulan(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate();

        return view('manejer.laporharibulan', ['data' => $data]);
    }
    
}
