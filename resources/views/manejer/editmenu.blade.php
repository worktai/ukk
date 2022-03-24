@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>
                Edit Menu Makanan/Minuman
                <hr>
            </h2>
                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama</strong>
                            <input type="text" name="nama" class="form-control" placeholder="cth:NasGor Padang">
                        </div>
                    </div>
                    <strong for="">Kategori Menu</strong>
                    <div class="form-group ">
                        <select class="form-control" name="kategori" id="level">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Harga</strong>
                        <input type="price" name="harga" class="form-control" placeholder="cth:10000">
                    </div>
                    </div>
                    <label for="">Gambar</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="image" placeholder="no telepon">
                    </div>
                

                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
        </div>
    </div>
</div>
@endsection
