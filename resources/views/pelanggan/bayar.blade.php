@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-header d-flex justify-content-between">
                <div class="pull-left">
                    <h2>Pembayaran Menu</h2>
                </div>
        </div>
    
        <div class="pull-right mt-4 mb-2">
            <a class="btn btn-danger" href="{{ route('dpesan.index') }}">Batalkan</a>
        </div>
        <hr>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Maaf </strong>Data Anda bermasalah<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        <form method="POST" action="{{route('dpesan.store')}}"  enctype="multipart/form-data">
            @csrf      

            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <h5 class="text-capitalize">Pemesan</h5>
                        <input type="text" name="nama_pemesan" class="form-control" value="{{$datapesan->nama_pemesan}}" readonly>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <h5>Harga Menu</h5>
                        <input type="number" name="harga" class="form-control" id="harga" value="{{ $menu[0]->harga}}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <h5>Jumlah menu yang dipesan</h5>
                    <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $datapesan->jumlah}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <h5>Nomor Meja</h5>
                    <input type="number" name="meja" class="form-control"  value="{{ $meja[0]->no_meja}}" readonly>
                    <input type="hidden" name="meja_id" class="form-control"  value="{{ $meja[0]->meja_id}}" >
                </div>
            </div>
            </div>

            <div class="row">  
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <h5>Total harga Menu yang di Pesan </h5>
                        <input type="number" id="total" name="total_beli" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <h5>Uang Pembayaran</h5>
                        <input type="number" name="total_bayar" id="total_bayar" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10">
                    <div class="form-group">
                        <h5>Uang Kembalian</h5> 
                        <input type="number" id="kembalian" name="kembalian" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <button type="submit" id="pesan" class="btn btn-primary">Bayar</button>
            <button type="button" class="btn btn-warning">Cetak</button>
            </div>
        </form>
        </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah, #harga").hover(function() {
            var harga  = $("#harga").val();
            var jumlah = $("#jumlah").val();
            var total = parseInt(harga) * parseInt(jumlah);
            $("#total").val(total);
        });
        $("#total, #total_bayar").on('input',function() {
          var total_bayar = $("#total_bayar").val();
            var total  = $("#total").val();
            var kembalian = parseInt(total_bayar) - parseInt(total);
            
            $("#kembalian").val(kembalian);
        });
        $("#pesan").click(function() {
            var kembalian = $('#kembalian').val();
            if(kembalian < 0){
              alert('Uang Anda Kurang bos kuu');
              event.preventDefault();
              return false;
            }
            
        });
    }); 
</script>
@endsection