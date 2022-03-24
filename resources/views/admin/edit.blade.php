@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Edit user
                <hr>
            </h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input type="text" value="{{$pengguna->name}}" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                        <input type="number" value="{{$pengguna->no_tlp}}" class="form-control" id="exampleInputEmail1" name="no_tlp" aria-describedby="emailHelp">
                    </div>
                    <strong for="">Level Pegawai</strong>
                    <div class="input-group mb-3">
                        <select class="form-control" name="level" id="level">
                            <option value="manejer" @if($pengguna->level == 'manejer') selected @endif>manejer</option>
                            <option value="kasir" @if($pengguna->level == 'kasir') selected @endif>kasir</option>
                        </select>
                    </div>
                    </div>
                    <strong for="">Status Pegawai</strong>
                    <div class="input-group mb-3">
                        <select class="form-control" name="status" id="status">
                            <option value="aktif" @if($pengguna->status == 'aktif') selected @endif>aktif</option>
                            <option value="nonaktif" @if($pengguna->status == 'nonaktif') selected @endif>nonaktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">email</label>
                        <input type="email" value="{{$pengguna->email}}"  class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                    </div>
        </div>
    </div>
</div>
@endsection
