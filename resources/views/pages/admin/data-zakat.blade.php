@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Data Zakat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: #eafbf5;">
                            <th>Nama Pengirim</th>
                            <th>Asal Bank</th>
                            <th>Bukti Pembayaran</th>
                            <th>Jenis Zakat</th>
                            <th>Nominal</th>
                            <th>Nomor Invoice</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->nama_pengirim}}</td>
                            <td>{{$item->asal_bank}}</td>
                            <td><a target="_blank" href="{{Storage::url($item->image)}}"><img class="img-thumbnail" src="{{Storage::url($item->image)}}" style="width: 150px" alt="Bukti Pembayaran"></a></td>
                            <td>{{$item->jenis_zakat}}</td>
                            <td>@currency($item->nominal)</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <div class="row d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="{{route('edit', $item->id)}}"><button type="button" class="btn btn-info btn-circle mx-1" data-toggle="modal" data-target="#exampleModal2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></a>

                                    <!-- Button trigger modal -->
                                    <form class="delete" action="{{route('data-zakat.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-circle mx-1" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('scripts')
<script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
@endsection
