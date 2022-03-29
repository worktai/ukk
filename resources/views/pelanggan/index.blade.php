 @extends('layouts.apps')


@section('style')
    @include('layouts.style')
@endsection


@section('content')
<hr>
<h2 class="text-center fw-bolder">Pesan Order</h2>

<div class="row ms-0" style="height: 84vh;">
<hr>

    <div class="col-13">
      @foreach($dtkat as $kat)
        @if ($kat->jumlah > 0)
        <h3 class="text-center text-black">{{ $kat->nama_kategori }}</h3>

        <div class="container">
            @foreach($dtmenu as $menu)
              @if($menu->kategori_id == $kat->id)
              <div class="card">
                  <img src="{{ asset('fotohotel/'.$menu->foto) }}" class="card-img-top" style="width: 200px; height: 150px" alt="{{ $menu->nama_menu }}">
                  <div class="card-body makan" data-id="{{ $menu->id }}">
                    <h5 class="card-title" data-foto="{{ $menu->foto }}" >{{ $menu->nama_menu }}</h5>
                    <p class="card-text">Rp {{ $menu->harga }}</p>
                    <!-- <button class="btn btn-primary me-auto">+ Pesan</button> -->
                    <!-- <div class="tambah_pesan">
                      <button class="btn btn-primary kurang "> - </button>
                      <input type="text" value="1" class="qty-pesan" readonly>
                      <button class="btn btn-primary tambah"> + </button>
                    </div> -->
                  </div>
                </div>
              @endif
            @endforeach
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="bar-order">
  <!-- <button id="back" class="btn btn-outline-secondary text-black">Back</button> -->
    <button class="btn btn-outline-success btn-lg text-black" id="next">Pesan</button>
</div>

@endsection


@section('script')
    <!-- Optional JavaScript; choose one of the two! -->
    @include('layouts.script')
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection