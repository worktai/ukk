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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $peng = pengguna::all();
        // return view('admin/pengguna',['peng' => $peng]);

        $peng = DB::table('pengguna')
        ->leftJoin('pengguna_has_user', 'pengguna.id_pengguna', '=', 'pengguna_has_user.id_pengguna')
        ->leftJoin('users', 'pengguna_has_user.id_user', '=', 'users.id')
        ->leftJoin('pengguna_has_manejer', 'pengguna.id_pengguna', '=', 'pengguna_has_manejer.id_pengguna')
        ->leftJoin('manejer','pengguna_has_manejer.id_manejer', '=', 'manejer.id_manejer')
        ->leftJoin('pengguna_has_kasir', 'pengguna.id_pengguna', '=', 'pengguna_has_kasir.id_pengguna')
        ->leftJoin('kasir', 'pengguna_has_kasir.id_kasir', '=', 'kasir.id_kasir')
        ->select('pengguna.*')
        ->get();

        // $pengguna = DB::table('pengguna')->get();

    return view('admin/pengguna',['peng' => $peng]);
    }


    public function create(Request $request)
    {
        //  pengguna::create($request->all());

        // $request->validate([
        //     'name'=>'required',
        //     'no_tlp'=>'required',
        //     'level'=>'required',
        //     'status'=>'required',
        //     'email'=>'required',
        //     'password' => ['required', 'string', 'min:4', 'confirmed'],
        // ]);
        // dd($request->level);

        $user= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
        ]);

        $user->assignRole('Admin')->get();

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

            return redirect()->route('index');





        // return $request->all();
    }


            // managefr


            // return redirect()->route('pengguna.index')->with('success','Data Berhasil di Input');

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengguna)
    {
    
        $pengguna = pengguna::find($id_pengguna);

        $pengguna = DB::table('pengguna')
        ->join('users', 'pengguna.id_pengguna', '=', 'users.id')
        ->join('kasir','pengguna.id_pengguna','=','kasir.id_kasir')
        ->join('manejer','pengguna.id_pengguna','=','manejer.id_manejer')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('pengguna.id_pengguna',)
        ->select('pengguna.*', 'users.*','kasir.*','manejer.*','model_has_roles.model_id')

        ->get();
        // dd($pengguna);
        return view('admin/edit', compact('pengguna'));

        }


    public function update(Request $request, $id)
    {
//         $request->validate([
//             'name'=>'required',
//             'no_tlp'=>'required',
//             'level'=>'required',
//             'status'=>'required',
//             'email'=>'required',
//             'password' => ['required', 'string', 'min:4', 'confirmed'],
//         ]);
//         DB::table('pengguna')->where('id_pengguna', $id )->update([
//             'name' => $request->name,
//             'no_tlp' => $request->no_tlp,
//             'level' => $request->level,
//             'status' => $request->status,
//             'email' => $request->email,
//             'password' => $request->password,
//             'created_at' => date("Y-m-d H:i:s"),
//             'updated_at' => date("Y-m-d H:i:s")
//         ]);
//         DB::table('users')->where('name',$id)->update([
//             'name'=>$request->name,
//             'password'=>$request->password,
//             'email' => $request->email,
//             'level'=>$request->level,
//             'created_at' => date("Y-m-d H:i:s"),
//             'updated_at' => date("Y-m-d H:i:s")
//         ]);

//         if ($request['level']=='manejer') {
//                 DB::table('manejer')->where('id_manejer',$id)->update([
//                     'name' => $request->name,
//                     'notlp' => $request->no_tlp,
//                     'level' => $request->level,
//                     'status' => $request->status,
//                     'email' => $request->email,
//                     'password' => $request->password,
//                     'created_at' => date("Y-m-d H:i:s"),
//                     'updated_at' => date("Y-m-d H:i:s")
//                 ]);

//         }
//         elseif ($request['level']=='kasir') {
//             DB::table('kasir')->where('id_kasir',$id)->update([
//                     'name'=> $request['name'],
//                     'notlp'=>$request['no_tlp'],
//                     'level'=>$request['level'],
//                     'status'=>$request['status'],
//                     'email'=>$request['email'],
//                     'password'=>$request['password'],
//                     'created_at' => date("Y-m-d H:i:s"),
//                     'updated_at' => date("Y-m-d H:i:s")
//             ]);


        }



//  return redirect()->route('pengguna.index')->with('success', "Data pengguna berhasil di update");
//         // return redirect('admin/index');
//     }


    public function destroy($id)
    {
        //
    }
}