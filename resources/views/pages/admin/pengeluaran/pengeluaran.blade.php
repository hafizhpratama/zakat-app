@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col align-self-end">
            <a href="{{route('create-pengeluaran')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white" style="background-color: #28DF99;">Create Pengeluaran</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #28DF99;">Pengeluaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background-color: #eafbf5;">
                            <th>Pengeluaran</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->pengeluaran}}</td>
                            <td>@currency($item->nominal)</td>
                            <td>{{$item->created_at->format('j F Y')}}</td>
                            <td>
                                <div class="row d-flex justify-content-center">
                                    <!-- Button trigger modal -->
                                    <a href="{{route('edit-pengeluaran', $item->id)}}"><button type="button" class="btn btn-info btn-circle mx-1" data-toggle="modal" data-target="#exampleModal2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></a>

                                    <!-- Button trigger modal -->
                                    <form class="delete" action="{{route('pengeluaran.destroy', $item->id)}}" method="POST">
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
    $(".delete").on("submit", function() {
        return confirm("Are you sure?");
    });
</script>
@endsection
