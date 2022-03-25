<?php

namespace App\Http\Middleware;

use Closure;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $user = \App\User::where('level', $request->level)->first();
        // if ($user->cekstatus == 'admin') {
        //     return redirect('utama');
        // } elseif ($user->cekstatus == 'manejer') {
        //     return redirect('menu_manejer');
        // }
        // elseif ($user->cekstatus == 'kasir') {
        //     return redirect('transaksi');
        // }
        // return $next($request);
        $levels = array_slice(func_get_args(), 2);
    
        foreach ($levels as $level) { 
            $level= \Auth::user()->level;
            if( $level== $level){
                return $next($request);
            }
        elseif ($level== 'manejer') {
              return redirect('menu_manejer');
            
        }elseif ($level== 'kasir') {
            return redirect('transaksi');
          
      }}
    
        return redirect('/home');
    }
}
