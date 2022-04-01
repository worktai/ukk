@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">
                <div class="pull-left">
                    <h2>Data Transaksi</h2>
                </div>
            </div>
            
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <form action="{{ url('note') }}" Method="GET">
                            <input type="date" placeholder="Cari Tanggal" name="date" value="{{ $request->date }}" class="form-control w-50 d-inline">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <form class="form" method="get" action="{{ url('note') }}">
                            <input type="text" name="cari" class="form-control w-50 d-inline" id="search" placeholder="Cari Nama Pegawai" value="{{$request->cari}}"> 
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </form>
                    </div>
                </div>
                
             
            </div>
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <tr class="text-primary"s>
                            <th>Nama Pemesan</th>
                            <th>Nama Menu</th>
                            <th>Jumlah Menu</th>
                            <!-- TOTAL HARGA MENU YANG DIBELI PEMESAN/PELANGGAN -->
                            <th>Total Harga Menu</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                        </tr>
                        @foreach($data as $u)
                        <tr>
                            <td>{{$u->nama_pemesan}}</td>
                            <td>{{$u->nama_menu}}</td>
                            <td>{{$u->jumlah}}</td>
                            <td>{{$u->total_beli}}</td>
                            <td>{{$u->nama_pegawai}}</td>
                            <td>
                                {{$u->created_at}}
                                <!-- <a href="createkasir" class="btn btn-warning">Pesan</a> -->
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
       
        </div>
    </div>
</div>
@endsection
