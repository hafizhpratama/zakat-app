@extends('layouts.web')

@section('content')
<section class="my-5">
    <div class="container">
        <div class="text-center mb-5">
            <img src="{{url('frontend/img/stepper-2.png')}}" alt="stepper">
        </div>
        <div class="text-center mb-5">
            <h1>Pembayaran</h1>
            <p class="text-grey">Silahkan ikuti instruksi di bawah ini</p>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <p>Transfer Pembayaran:<br>
                    Total: <span style="font-weight: bold;">Rp. </span><label style="font-weight: bold;" id="rupiah"></label></p>
                <div class="row align-items-center">
                    <div class="col-4">
                        <img style="width: 100%;" class="w-75" src="{{url('frontend/img/bank-mandiri-syariah.png')}}" alt="">
                    </div>
                    <div class="col-8">
                        <p class="mb-0">Bank Mandiri Syariah<br>
                            7109 4377 13 <br>
                            Hafizh Pratama</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="{{route('bayar-zakat.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Upload Bukti Transfer</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="form-group">
                        <label>Asal Bank</label>
                        <input type="text" class="form-control" name="asal_bank" value="{{old('asal_bank')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pengirim</label>
                        <input type="text" class="form-control" name="nama_pengirim" value="{{old('nama_pengirim')}}" required>
                    </div>
                    <div class="form-group">
                        <label>Pilih Zakat</label>
                        <input type="text" class="form-control" name="jenis_zakat" value="{{$jeniszakat}}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="price">Nominal</label>
                        <input type="number" class="form-control" name="nominal" placeholder="Nominal" step="1" value="{{$bayar}}" readonly>
                    </div>
                    <button type="submit" class="btn btn-green text-white">Konfirmasi Sekarang</button>
                    <a href="{{route('hitung-zakat')}}"><button type="button" class="btn btn-grey text-grey">Kembali</button></a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    var bilangan = "{{$bayar}}";
    var number_string = bilangan.toString(),
        split = number_string.split('.'),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    document.getElementById("rupiah").innerHTML = rupiah;
</script>
@endsection
