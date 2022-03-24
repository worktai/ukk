<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\user;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index()
    {
        $menu = DB::table('menu')
        ->leftJoin('menu_has_user', 'menu.id_menu', '=', 'menu_has_user.id_menu')
        ->leftJoin('users','menu_has_user.id_user', '=', 'users.id')
        ->select('users.name','menu.*')
        ->get();

        return view('manejer/menu_manejer',['menu' => $menu]);
    }

    public function create()
    {
        return view('manejer/menu_manejer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'kategori'=>'required',
            'harga'=>'required',
            'image'=>'required',
        ]);
        // dd($request);

        $image = $request->file('image');
        $nameImage = $request->file('image')->getClientOriginalName();
        $thumbImage = image::make($image->getRealPath())->resize(85, 85);
        $thumbPath = public_path() . '/imagemenu/' . $nameImage;
        $thumbImage = Image::make($thumbImage)->save($thumbPath);
        //  dd($request,$image);
        return menu::create([
            'nama'=> $request['nama'],
            'kategori'=>$request['kategori'],
            'harga'=>$request['harga'],
           'image'=>$request['image'],
            'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s")
        ]);
      
        return redirect()->route('menu_manejer')->with('success','Data Berhasil di Input');
    }
}
