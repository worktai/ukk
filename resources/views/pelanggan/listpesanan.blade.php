@extends('layouts.apps')


@section('style')
    @include('layouts.style')
@endsection

@section('content')
@csrf
<div class="black"></div>
<header> 

    <div class="top-bar mx-4">
        <h1 class="text-white text-center overflow-hidden">List Pesanan</h1>
    </div>

    <div class="listpesan text-white">
        <div class="pemesan d-flex justify-content-start mt-3">
            <p id="nama" class="me-2"></p> /
            <p id="no_meja" class="ms-2"></p>


        </div>
        <div id="daftar">
            
        </div>
    </div>
</header>
<div class="bar-order justify-content-between">
    <a href="/pesan" class="btn btn-warning text-white">Ubah pesanan</a>
    <div class="a">
        <span id="total-bayar" class="text-white"></span>
        <button id="bayar" class="btn btn-success ms-3">Pembayaran</button>
    </div>
</div>
@endsection

@section('script')
    <!-- Optional JavaScript; choose one of the two! -->
    @include('layouts.script')
    <script src="{{ asset('js/pembayaran.js') }}"></script>

@endsection