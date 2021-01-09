@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Update Data</h6>
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
            <form action="{{route('data-zakat.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nama Pengirim</label>
                    <input type="text" class="form-control" name="nama_pengirim" value="{{$item->nama_pengirim}}" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Asal Bank</label>
                    <input type="text" class="form-control" name="asal_bank" value="{{$item->asal_bank}}" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Jenis Zakat</label>
                    <input type="text" class="form-control" name="jenis_zakat" value="{{$item->jenis_zakat}}" readonly>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nominal</label>
                    <input type="number" class="form-control" name="nominal" value="{{$item->nominal}}" readonly>
                </div>
                <div class="form-group">
                    <img src="{{Storage::url($item->image)}}" style="width: 150px" alt="Bukti Pembayaran">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                    <select class="form-control" name="status">
                        @if ($item->status == "Proses Verifikasi")
                        <option value="Proses Verifikasi">Proses Verifikasi</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Ditolak">Ditolak</option>
                        @elseif ($item->status == "Lunas")
                        <option value="Lunas">Lunas</option>
                        <option value="Proses Verifikasi">Proses Verifikasi</option>
                        <option value="Ditolak">Ditolak</option>
                        @else
                        <option value="Ditolak">Ditolak</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Proses Verifikasi">Proses Verifikasi</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn text-white btn-block" style="background-color: #28DF99;">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
