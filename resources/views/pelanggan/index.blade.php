 @extends('layouts.apps')


 @section('style')
 @include('layouts.style')
 @endsection


 @section('content')


 <div class="row ms-0" style="height: 84vh;">
     <hr>
     <h2 class="text-center fw-bolder">Pesan Order</h2>

     <hr>
{{-- FORM PESANAN ORDER BARUUUU REVISIII --}}
     {{-- <div class="row">
         <div class="col-md-2">
             <div class="form-group">
                 <strong>Nama Pemsesan</strong>
                 <input type="text" name="nama_pemesan" id="nama" class="form-control" required>
             </div>
         </div>
         <div class="col-md-2">
             <div class="form-group">
                 <strong>Meja</strong>
                 @if($dtmeja)
                 <select name="meja_id" class="form-select" id="meja">
                     <option>Pilih meja</option>
                     @foreach($dtmeja as $meja)
                     <option value="{{ $meja->meja_id }}">{{ $meja->no_meja }}</option>
                     @endforeach
                     @else
                     <input type="text" value="Sudah Penuh">
                     @endif
                 </select>
             </div>
         </div>
     </div> --}}

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
                     <h5 class="card-title" data-foto="{{ $menu->foto }}">{{ $menu->nama_menu }}</h5>
                     <p class="card-text">Rp {{ $menu->harga }}</p>
                      {{-- <button type="submit" class="btn btn-success">+ Pesan</button> --}}
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
     <button type="button" class="btn btn-outline-success btn-lg text-black" data-toggle="modal" data-target="#exampleModalCenter">
         Tambah Pesanan
     </button>
 </div>


 <!-- Button trigger modal -->


 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Silahkan di isi </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="{{route('simpan')}}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <div class="modal-body">
                     <div class="form-group">
                         <strong>Nama Pemsesan</strong>
                         <input type="text" name="nama_pemesan" id="nama" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <strong>Meja</strong>
                         @if($dtmeja)
                         <select name="meja_id" class="form-select" id="meja">
                             <option>Pilih meja</option>
                             @foreach($dtmeja as $meja)
                             <option value="{{ $meja->meja_id }}">{{ $meja->no_meja }}</option>
                             @endforeach
                             @else
                             <input type="text" value="Sudah Penuh">
                             @endif
                         </select>
                     </div>
                     <div class="form-group">
                         <strong>Menu</strong>
                         @if($dtmenu)
                         <select name="menu_id" class="form-select" id="menu">
                             <option>Pilih Menu</option>
                             @foreach($dtmenu as $menu)
                             <option value="{{ $menu->id }}">{{ $menu->nama_menu }} = {{ $menu->harga }}</option>

                             @endforeach
                             @else
                             <input type="text" value="Sudah Penuh">
                             @endif
                         </select>
                     </div>
                     <div class="form-group">
                         <strong>Jumlah Pesanan</strong>
                         <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Tambah</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 @endsection


 @section('script')
 <!-- Optional JavaScript; choose one of the two! -->
 @include('layouts.script')

 @endsection
