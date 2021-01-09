@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Update Emas</h6>
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
                    <label for="recipient-name" class="col-form-label">Harga Emas</label>
                    <input type="number" class="form-control" name="harga_emas" value="{{$item->harga_emas}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block" style="background-color: #28DF99; border: 0px;">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
