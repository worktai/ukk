@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title ">Data Kategori</h4>
    <button class="btn btn-primary" id="btn-Tambah-kategori" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah Kategori</button>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="text-primary">

                      <th>Id</th>  
                      <th>Nama</th>
                      <!-- <th>Jumlah Menu</th> -->
                      <th>Aksi</th>

                    </tr>    
                    @foreach($datakategori as $kategori)  
                    <tr>

                      <td>{{ $kategori->id }}</td>
                      <td>{{ $kategori->nama_kategori }}</td>
                      <!-- <td>{{ $kategori->jumlah }}</td> -->
                      <td>    
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>

                    </tr>
                      @endforeach
                </table>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title-modal">Tambah Kategori</h5>
              <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
<form action="{{route('kategori.store')}}" method="POST">
              @csrf
            <div class="modal-body">
              <input type="hidden" id="idkategori">
                <div class="form-group">
                  <label for="nama_kategori">Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="masukkan nama kategori.. ">
                  <span class="text-danger errornama" style="display: none">Nama Kategori harus diisi</span>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary tutup-modal" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>
        </div>
    </div>
</div>

@endsection