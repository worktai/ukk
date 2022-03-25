<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use App\Models\user;
use App\menu;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class MenuController extends Controller
{
    public function index()
    {
        $menu = DB::table('menu')->paginate(5);
        // ->leftJoin('menu_has_user', 'menu.id_menu', '=', 'menu_has_user.id_menu')
        // ->leftJoin('users','menu_has_user.id_user', '=', 'users.id')
        // ->select('users.name','menu.*')




        return view('manejer/menu_manejer',['menu' => $menu], ["title" => "Manejer"]);
    }

    public function store(Request $request)
    {
        $data=Menu::create($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('fotohotel/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
     
        }
        // if ($files = $request->file('image')) {
        //     $destinationPath = 'public/image/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $profileImage);
        //     $insert['image'] = "$profileImage";
        //     }
       
        // menu::create([
        //     'nama'=> $request['nama'],
        //     'kategori'=>$request['kategori'],
        //     'harga'=>$request['harga'],
        //     'image'=>$request['image'],
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s") 
           
        // ]); 
      
        return redirect()->route('menu_manejer');
    }

    public function edit($id_menu)
    {
        $menu = menu::find($id_menu);
        return view('manejer/editmenu',['menu' => $menu]);
    }
    public function update(Request $request,$id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->update($request->all());
        return redirect()->route('menu_manejer');
    }
    public function delete($id_menu)
    {
        $menu = menu::find($id_menu);
        $menu->delete();
        return redirect()->route('menu_manejer');
    }
 

}