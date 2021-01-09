@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Pengeluaran</h6>
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
            <form action="{{route('create-pengeluaran.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Pengeluaran</label>
                    <input type="text" class="form-control" name="pengeluaran" value="{{old('pengeluaran')}}" required>
                </div>
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" class="form-control" name="nominal" step="1" value="{{old('bayar')}}" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="created_at">
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #28DF99; border: 0px;">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
