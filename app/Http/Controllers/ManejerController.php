<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManejerController extends Controller
{
    public function laporantransaksi(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $data = pesanan::whereBetween('created_at',array($from, $to))->paginate(10);
        return view('manejer.note', compact('data'));
    }
}
