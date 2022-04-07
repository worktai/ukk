@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header d-flex justify-content-between bg-dark">
                <h4 class="text-light">Data Meja</h4>
                <button class="btn btn-secondary" id="btn-Tambah-kategori" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fas fa-plus"></i> Tambah Meja</button>
            </div>
            <hr>

            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <tr class="text-primary">
                            {{-- <th>Id</th> --}}
                            <th>No Meja</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($datameja as $meja)
                        <tr>
                            {{-- <td>{{ $meja->meja_id }}</td> --}}
                            <td>{{ $meja->no_meja }}</td>
                            <td>
                                <div class="badge {{ ($meja->status == 'Tersedia') ? 'badge-success' : 'badge-danger' }}">
                                    {{ $meja->status }}
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('meja.destroy', $meja->meja_id) }}" method="POST">
                                    <a href="{{ route('meja.edit',$meja->meja_id) }}" class="btn btn-warning">Edit</a>

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
                <h5 class="modal-title" id="title-modal"></h5>
                <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('meja.store') }}" method="POST" id="FormMeja">
                @csrf
                <div class="modal-body">
                    <!-- <input type="hidden" class="form-control" name="meja_id" id="meja"> -->
                    <div class="form-group">
                        <label for="no_meja">No Meja</label>
                        <input type="number" class="form-control" name="no_meja" id="no_meja" placeholder="masukkan nomor meja.." required>
                        <span class="text-success" style="display: none">nomor meja bisa digunakan</span>
                        <span class="text-danger" style="display: none">nomor meja Sudah ada</span>

                    </div>
                    <p class="m-0">Status</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="Tidak Tersedia" required>
                        <label class="form-check-label p-0" for="status1">Tidak Tersedia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="Tersedia" required>
                        <label class="form-check-label p-0" for="status2">Tersedia</label>
                    </div> <br>
                    <span class="text-danger" style="display: none">status harus dipilih</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
