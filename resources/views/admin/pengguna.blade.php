@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2>
                Pengguna user
                <hr>
            </h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                TAMBAH USER
            </button>

            <!-- MODAL CREATE USER -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('pengguna.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name="no_tlp" aria-describedby="emailHelp">
                                </div>
                                <strong for="">Level pegawai</strong>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="level" id="level">
                                        <option value="---">level</option>
                                        <option value="manejer">manager</option>
                                        <option value="kasir">kasir</option>
                                    </select>
                                </div>
                                <strong for="">Status pegawai</strong>
                                <div class="input-group mb-3">
                                    <select class="form-control" name="status" id="status">
                                        <option value="aktif">aktif</option>
                                        <option value="nonaktif">nonaktif</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
                @foreach($peng as $i => $p)
                <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->no_tlp}}</td>
                    <td>{{$p->status}}</td>
                    <td>{{$p->level}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->password}}</td>
                    <td><a href="{{ route('pengguna.edit',$p->id_pengguna) }}" class="btn btn-warning btn-sm">Edit</a></td>

                </tr>
                @endforeach
        </div>
    </div>
</div>
@endsection
