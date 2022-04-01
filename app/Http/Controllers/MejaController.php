<?php

namespace App\Http\Controllers;
use App\meja;
use App\pesanan;
use DB;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        return view('manejer.meja',[
            'datameja' => meja::all()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'no_meja' => 'required',
            'status' => 'required'
        ]);
        meja::create($request->all());
        activity()->log('Menambahkan Meja');
        return redirect()->route('meja.index');
    }

    public function edit($id)
    {
        $meja_id = $id;
        $meja = meja::find($meja_id);
        return view('manejer.editmeja',['meja' => $meja]);
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'status' => 'required'
        ]);
        meja::where('meja_id',$id)->update([
            'status'=>$request['status'],
        ]);
        activity()->log('Mengubah Meja');
        return redirect()->route('meja.index');
    }

    public function destroy($id)
    {   
        $deleted = DB::table('mejas')->where('meja_id', $id)->delete();
        activity()->log('Menghapus Meja');
        return redirect()->route('meja.index');
    }
}
