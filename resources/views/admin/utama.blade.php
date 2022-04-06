@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header bg-dark">
                <h2 class="text-light"><u>Aktivitas Log Pegawai</u></h2>
            </div>
            <hr>
            <div class="card-body">
                <div class="block-content">
                    <table class="table table-bordered">
                    <tr class="bg-dark text-light bg-hover-ligh">
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
</div>
@endsection
