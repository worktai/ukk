@extends('layouts.dashboard')

    @section('style')
    @include('manejer.style')
    @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card-header">
            <h4 class="card-title ">Edit Data FormMeja</h4>
        </div>
            <form action="{{ route('meja.update', $meja->meja_id) }}" method="POST" id ="FormMeja" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                    <div class="modal-body">
                      <input type="hidden" class="form-control" name="meja_id" id="meja">
                      <div class="form-group">
                        <label for="no_meja">No Meja</label>
                        <input type="number" value="{{$meja->no_meja}}" class="form-control" name="no_meja" id="no_meja" disabled>
                          <span class="text-success" style="display: none">nomor meja bisa digunakan</span>
                          <span class="text-danger" style="display: none">nomor meja Sudah ada</span>
                      </div>
                        <p class="m-0">Status</p>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="status1" value="Tidak Tersedia">
                          <label class="form-check-label p-0" for="status1">Tidak Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status" id="status2" value="Tersedia">
                          <label class="form-check-label p-0" for="status2">Tersedia</label>
                        </div> <br>
                        <span class="text-danger" style="display: none">status harus dipilih</span>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">Ubah</button>
                    </div>
                  </form>
      </div>
    </div>
</div>

@endsection
@section('script')
@include('manejer.script')
    <script src="{{ asset('js/manejer/meja.js') }}"></script>
@endsection