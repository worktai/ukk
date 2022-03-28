<?php

namespace App\Http\Controllers;
use App\meja;
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
        $request->validate([
            'no_meja' => 'required',
            'status' => 'required'
        ]);
        meja::create($request->all());
        return redirect()->route('meja.index');
    }

    public function edit($id)
    {
        $request->validate([
            'no_meja' => 'required',
            'status' => 'required'
        ]);
        meja::find($id)->update($request->all());
        return redirect()->route('meja.index');
    }

    public function update(Request $request, $id)
    {
        $meja = menu::find($id);
        $meja->update($request->all());
        return redirect()->route('meja.index');
    }

    public function destroy($id)
    {
        return redirect()->route('meja.index');
    }
}
