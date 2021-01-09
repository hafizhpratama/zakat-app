@extends('layouts.web')

@section('content')
<section>
    <div class="center-content">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h1 class="text-heading-responsive font-weight-bold">Kami akan membantu anda untuk menghitung dan membayar zakat kepada orang yang membutuhkan.</h1>
                    <div class="mt-4">
                        <a href="{{url('user/bayar-zakat')}}"><button type="button" class="btn btn-green px-4 py-2 text-white mr-2">Bayar Zakat</button></a>
                        <a href="{{url('hitung-zakat')}}"><button type="button" class="btn btn-grey px-4 py-2 text-grey">Hitung Zakat</button></a>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <img style="width: 100%;" class="img-fluid p-5" src="{{url('frontend/img/pic-1.png')}}" alt="">
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
