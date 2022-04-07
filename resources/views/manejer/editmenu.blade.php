@extends('layouts.dashboard')

@section('content')

@foreach($menu as $m)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header d-flex justify-content-between">
                <h3>Edit Menu</h3>
            </div>

            <div class="modal-body">
                <form action="/menu/edit/{{ $m->id }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            Nama Menu<input class="form-control" type="text" name="nama_menu" required="required" value="{{ $m->nama_menu }}">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            Harga <input class="form-control" type="text" name="harga" required="required" value="{{ $m->harga }}">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            Image <input type="file" value="foto" class="form-control" id="exampleFormControlFile1" name="foto">
                            Gambar Lama:
                            <img src="{{ asset("fotohotel/$m->foto") }}" class="img-thumbnail" style="width:100px" ;>
                        </div>
                        <h5>{{ $m->foto }}</h5>
                        <div class="modal-footer">
                            <input class="btn btn-warning" type="submit" value="Simpan Data">
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


@endforeach

@endsection
