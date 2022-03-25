@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>Catatan Transaksi</h1>
        <table class="table table-hover">
        <tr>
            <th>ID Transaksi</th>
            <th>Id meja</th>
            <th>Id menu</th>
            <th>Id Pegawai</th>
            <th>Jumlah Pesanan</th>
            <th>Total Harga</th>
            <th>Jumlah Pembayaran</th>
            <th>Uang Kembalian</th>
        </tr>
        </table>
        </div>
    </div>
</div>

@endsection