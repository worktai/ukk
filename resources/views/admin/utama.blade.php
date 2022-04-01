@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header d-flex justify-content-between">
                <h2>Aktivitas Log Pegawai</h2>
            </div>
                <div class="block-content">
                    <table class="table table-bordered table-hover">
                    <tr class="text-danger">
                        <th>Nama User</th>
                        <th>Keterangan Aktivitas Pegawai</th>
                        <th>Tanggal</th>
                    </tr>
                    @foreach ($activity_log as $item)
                        <tr>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
