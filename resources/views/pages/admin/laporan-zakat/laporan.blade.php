@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Laporan Zakat</h6>
        </div>
        @if($errors ->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tglAwal" id="tglAwal" required>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tglAkhir" id="tglAkhir" required>
                </div>
                <a href="#" onclick="this.href='/admin/data-zakat/laporan-zakat/'+document.getElementById('tglAwal').value + '/' +document.getElementById('tglAkhir').value " target="_blank" class="btn text-white col-md-12" style="background-color: #1cc88a;">Cetak</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
