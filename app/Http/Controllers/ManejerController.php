<?php

namespace App\Http\Controllers;
use App\pesanan;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

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
        $datass = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'),
            DB::raw(' MONTH(created_at) month')
            ])->groupBy('month')
            ->where('created_at', '>=',Carbon::now()->subMonth())
            ->get();
        $outpat = [];
        foreach($datass as $entry) {
            $outpat= $entry->sum;
        }
        $data = pesanan::select([
            DB::raw('sum(total_beli) as `sum`'),
            DB::raw(' DATE(created_at) day')
            ])->groupBy('day')
            ->where('created_at', '>=',Carbon::now()->subweeks())
            ->get();
        $output = [];
        foreach($data as $entry) {
            $output= $entry->sum;
        }
        //  dd($output);
       return view('manejer.laporharibulan', ['outpat'=>$outpat],['output'=>$output]);
    }
    public function laporhariini() {
        
    }


}
