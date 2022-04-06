@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header bg-dark">
                <div class="pull-left">
                    <h2 class="text-light">Laporan Pendapatan</h2>
                </div>
            </div>
            <hr>

            <div class="container-fluid">
                <div class="row">
                    <div class="card-header bg-light">
                        <div class="pull-left">
                            <h2 class="text-dark">Pendapatan Hari ini: Rp. {{ $outpat }}</h2>
                            <hr>
                            <h2 class="text-dark">Pendapatan Bulan ini: Rp. {{ $outpat }}</h2>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
