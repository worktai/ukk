@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>Menu Makanan dan Minuman</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Menu
        </button>
        <input type="search">
            <table class="table table-striped">
                <tr>
                    <th>ID MENU</th>
                    <th>Nama menu</th>
                    <th>kategori</th>
                    <th>harga</th>
                    <th>image</th>
                    <th>Aksi</th>
                </tr>
                @foreach($menu as $m)
                <tr>
                    <td>{{ $m->id_menu }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->kategori }}</td>
                    <td>{{ $m->harga}}</td>
                    <td>
                    <img src="{{asset('fotohotel/'.$m->image)}}" alt="" style="width:100px";>
                    </td>
                    <td>
                    <a href="{{ route('menu.edit',$m->id_menu) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="{{ route('menu.delete',$m->id_menu) }}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                    
                @endforeach
            </table>
            {!! $menu->links() !!}
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
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection