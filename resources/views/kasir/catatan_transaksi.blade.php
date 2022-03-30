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
            <table class="table table-hover table-bordered">
            <tr>
                <th>Nama Pemesan</th>
                <th>Harga Menu</th>
                <th>Jumlah Menu</th>
                <th>Nomor Meja</th>
                <th>Harga Pesanan</th>
                <th>Bayaran Pemesan</th>
                <th>Uang Kembalian</th>
            </tr>
            @foreach($pesanan as $trans)
            <tr>
                <td>{{$trans->nama_pemesan}}</td>
                <td>{{$trans->harga}}</td>
                <td>{{$trans->jumlah}}</td>
                <td>{{$trans->meja}}</td>
                <td>{{$trans->total_beli}}</td>
                <td>{{$trans->total_bayar}}</td>
                <td>{{$trans->kembalian}}</td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>

@endsection