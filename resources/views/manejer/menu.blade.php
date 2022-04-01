@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header d-flex justify-content-between">
        <h4>Menu Makanan dan Minuman</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Menu
        </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="text-primary">
                        <th>ID MENU</th>
                        <th>Nama menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($datamenu as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->nama_menu }}</td>
                        <td>{{ $m->kategori->nama_kategori}}</td>
                        <td>{{ $m->harga}}</td>
                        <td><img src="{{asset('fotohotel/'.$m->foto)}}" alt="" style="width:100px";></td>
                        <td>
                        <form action="{{ route('menu.destroy', $m->id) }}" method="POST">
                        <a href="{{ route('menu.edit', $m->id ) }}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        </td>  
                    @endforeach
                    </tr>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Makanan/Minuman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama</strong>
                    <input type="text" name="nama_menu" class="form-control" placeholder="cth:NasGor Padang">
                </div>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" name="kategori_id" id="kategori">
                  <option value="">Pilih kategori</option>
                  @foreach($datakategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <strong>Harga</strong>
                <input type="price" name="harga" class="form-control" placeholder="cth:10000">
            </div>
            </div>
            <label for="">Gambar</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="foto">
            </div>
    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection