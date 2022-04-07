<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengguna;
use App\user;
use App\kasir;
use App\manejer;
use DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $peng = DB::table('pengguna')
        ->leftJoin('pengguna_has_user', 'pengguna.id_pengguna', '=', 'pengguna_has_user.id_pengguna')
        ->leftJoin('users', 'pengguna_has_user.id_user', '=', 'users.id')
        ->leftJoin('pengguna_has_manejer', 'pengguna.id_pengguna', '=', 'pengguna_has_manejer.id_pengguna')
        ->leftJoin('manejer','pengguna_has_manejer.id_manejer', '=', 'manejer.id_manejer')
        ->leftJoin('pengguna_has_kasir', 'pengguna.id_pengguna', '=', 'pengguna_has_kasir.id_pengguna')
        ->leftJoin('kasir', 'pengguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->select('pengguna.*')
        ->get();

    return view('admin/pengguna',['peng' => $peng], ["title" => "Peran User"]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'no_tlp' =>'required',
            'level' =>'required',
            'status' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);
        
        pengguna::create([
            'name'=> $request['name'],
            'no_tlp'=>$request['no_tlp'],
            'level'=>$request['level'],
            'status'=>$request['status'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            
            ]);
            
            if($request['level'] == 'level'){
                $id_user = DB::table('users')->where('name', $request['name'])->value('id');
                
                $id_pengguna = DB::table('pengguna')->where('name',$request['name'])->value('id_pengguna');
                $datasave = [
                    'id_user'=>$id_user,
                    'id_pengguna'=>$id_pengguna,
                ];
                
                DB::table('pengguna_has_user')->insert($datasave);
                $user= User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                    'password' => Hash::make($request['password']),
                ]);
                $user->assignRole('admin')->get();
                
                return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');
                
            } elseif($request['level'] == 'manejer'){
                
                $id_pengguna = DB::table('pengguna')->where('name',$request['name'])->value('id_pengguna');
                
                $inputan = [
                    'name'=> $request['name'],
                    'notlp'=>$request['no_tlp'],
                    'level'=>$request['level'],
                    'status'=>$request['status'],
                    'email'=>$request['email'],
                    'password'=>$request['password'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                DB::table('manejer')->insert($inputan);
                
                $id_manejer = DB::table('manejer')->where('level', $request['level'])->value('id_manejer');
                
                $datasave = [
                    'id_pengguna'=>$id_pengguna,
                    'id_manejer'=>$id_manejer,
                ];
                DB::table('pengguna_has_manejer')->insert($datasave);
                $user= User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                    'password' => Hash::make($request['password']),
                ]);
                $user->assignRole('manejer')->get();
                
                activity()->log('Menambahkan Manejer');
                return redirect()->route('index')->with('success','Data Berhasil di Input');
                
            } elseif($request['level'] == 'kasir') {
                $id_pengguna = DB::table('pengguna')->where('name',$request['name'])->value('id_pengguna');
                
                $inputan = [
                    'name'=> $request['name'],
                    'notlp'=>$request['no_tlp'],
                    'level'=>$request['level'],
                    'status'=>$request['status'],
                    'email'=>$request['email'],
                    'password'=>$request['password'],
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
                DB::table('kasir')->insert($inputan);
                
                
                $id_kasir = DB::table('kasir')->where('level', $request['level'])->value('id_kasir');
                
                $datasave = [
                    'id_pengguna'=>$id_pengguna,
                    'id_kasir'=>$id_kasir,
                ];
                
                DB::table('pengguna_has_kasir')->insert($datasave);
                $user= User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'level' => $request['level'],
                    'password' => Hash::make($request['password']),
                ]);
                $user->assignRole('kasir')->get();

                // dd($request);
                activity()->log('Menambahkan User Kasir');    
                return redirect()->route('index');
                
                



        // return $request->all();
    }

     }

    public function edit($id_pengguna)
    {
        $pengguna = DB::table('pengguna')->where('id_pengguna', $id_pengguna)->get();
        return view('admin/edit', compact('pengguna'));
    }


    public function update(Request $request, $id)
    {
        DB::table('pengguna')->where('id_pengguna', $request->id)->update([
            'status' => $request->status
            
        ]);
        activity()->log('Mengedit/Mengubah User');
        return redirect()->route('index');  
    }



//  return redirect()->route('pengguna.index')->with('success', "Data pengguna berhasil di update");
//         // return redirect('admin/index');
//     }


    public function destroy($id)
    {
        $deleted = DB::table('pengguna')->where('id_pengguna', $id)->delete();
        activity()->log('Menghapus User');
        return redirect()->route('index');
    }
}