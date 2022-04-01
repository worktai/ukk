@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">
                <div class="pull-left">
                    <h2>Laporan Pendapatan Harian Maupun Bulanan</h2>
                </div>
            </div>

                <div class="card-header">

                    <form action="{{url('haribulan')}}" method="get">
                        @csrf
                        <div class="form-group row">
                            <label for="from" class="col-form-label col-sm-2">Dari Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" id="from" name="from"  required>
                            </div>
                            <label for="to" class="col-form-label col-sm-2">Sampai Tanggal</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control input-sm w-100" id="to" name="to" required>
                            </div>
                            <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                            </div>
                        </div>
                    </form>

                </div>

       
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <tr class="text-primary"s>
                            <th>Total Harga Menu</th>
                            <th>Tanggal</th>
                        </tr>
                        @foreach($data as $u)
                        <tr>
                            <td>{{$u->total_beli}}</td>
                            <td>
                                {{$u->created_at}}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
       
        </div>
    </div>
</div>
@endsection
