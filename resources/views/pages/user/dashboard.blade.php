@extends('layouts.web')

@section('content')
<section class="my-5">
    <div class="container">
        <div class="text-center">
            <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="avatar">
            <h6 class="mt-3 font-weight-bold">{{Auth::user()->name}}</h6>
            <p>Status Pembayaran Zakat pada Website ZakatKita</p>
            <!-- Search form -->
            <div class="d-flex flex-row-reverse  mt-5 mb-4">
                <form class="form-inline" action="/user/search" method="GET">
                    <input class="form-control mr-2" type="text" placeholder="Search" aria-label="Search" name="search" value="{{ request()->get('search') }}">
                    <button type="submit" class="btn btn-green">
                        <svg style="fill: #fff" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #eafbf5;">
                            <th scope="col">Nomor Invoice</th>
                            <th scope="col">Nama Pengirim</th>
                            <th scope="col">Asal Bank</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Jenis Zakat</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama_pengirim}}</td>
                            <td>{{$item->asal_bank}}</td>
                            <td><a target="_blank" href="{{Storage::url($item->image)}}"><img class="img-thumbnail" src="{{Storage::url($item->image)}}" style="width: 150px" alt="Bukti Pembayaran"></a>
                            </td>
                            <td>{{$item->jenis_zakat}}</td>
                            <td>@currency($item->nominal)</td>
                            <td>{{$item->status}}</td>
                            <td><a target="_blank" href="{{route('invoice', $item->id)}}"><button type="button" class="btn btn-green text-white btn-circle mx-1" data-toggle="modal" data-target="#exampleModal2">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-break" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 0H4a2 2 0 0 0-2 2v7h1V2a1 1 0 0 1 1-1h5v2.5A1.5 1.5 0 0 0 10.5 5H13v4h1V5L9 0zm5 12h-1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-2H2v2a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-2zM0 10.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </button></a></td>
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
        <div class="row d-flex justify-content-center mt-5">
            {{$items->links()}}
        </div>
    </div>
</section>
@endsection
