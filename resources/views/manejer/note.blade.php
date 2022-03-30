@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header d-flex justify-content-between">
                <div class="pull-left">
                    <h2>Data Transaksi</h2>
                </div>
            </div>
            
                <form action="{{route('laporantransaksi')}}" method="get">
                    @csrf
                    <div class="form-group row">
                        <label for="from" class="col-form-label col-sm-2">Dari Tanngal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm w-100" id="from" name="from"  required>
                        </div>
                        <label for="to" class="col-form-label col-sm-2">Sampai Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm w-100" id="to" name="to" required>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Pemesan</th>
                            <th>Harga Menu</th>
                            <th>Jumlah Menu</th>
                            <th>Nomor Meja</th>
                            <th>Harga Pesanan</th>
                            <th>Bayaran Pemesan</th>
                            <th>Uang Kembalian</th>
                        </tr>
                        @foreach($data as $u)
                        <tr>
                        <td>{{$u->nama_pelanggan}}</td>
                        <td>{{$u->nama_menu}}</td>
                        <td>{{$u->jumlah}}</td>
                        <td>{{$u->total_harga}}</td>
                        <td>{{$u->nama_pegawai}}</td>
                        <td>
                            {{$u->tanggal}}
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
