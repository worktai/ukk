@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Catatan transaksi
                <hr>
                <form action="" method="POST">
                    @csrf
                      
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="date" name="filter" class="form-control" id="filter">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                       <br>
                    </form>
                    <form action="" method="POST">
                    @csrf
                        
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" name="search" class="form-control" id="search" placeholder="Nama Tamu">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                       
                    </form>
            </h2>
        </div>
    </div>
</div>
@endsection
