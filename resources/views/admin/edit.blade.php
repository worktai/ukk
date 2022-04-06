@extends('layouts.dashboard')

@section('content')

@foreach($pengguna as $p)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <div class="card-header d-flex justify-content-between">
        <h3>Edit User</h3>
        </div>

            <form action="/pengguna/edit/{{ $p->id_pengguna }}" method='post'>
            @csrf

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    Nama Pengguna <input class="form-control" type="text" name="nama_pengguna" required="required" readonly value="{{ $p->name }}">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    No Telepon <input class="form-control" type="number" name="no_telp" required="required"  readonly value="{{ $p->no_tlp }}"> 
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    Level<select name="level" id="tipe_kamar" class="form-control" >
                        <option selected class="form-select form-check disabled text-muted" aria-label="disabled select example" disabled>Pilih salah satu Level</option>
                        <option value="kasir">Kasir</option>
                        <option value="manejer">Manajer</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    Status<select name="status" id="tipe_kamar" class="form-control" >
                    <option selected class="form-select form-check text-muted" aria-label="disabled select example" disabled value="{{ $p->status }}">{{ $p->status }}</option>
                    </select>  
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    Email <input class="form-control" type="email" name="email" required="required"  readonly value="{{ $p->email }}">    
                </div>

                <div class="modal-footer">
                    <input class="btn btn-warning" type="submit" value="Simpan Data">
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
@endforeach

@endsection
