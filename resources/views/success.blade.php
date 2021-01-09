@extends('layouts.web')

@section('content')
<section>
    <div class="center-content">
        <div class="text-center mb-5">
            <img src="{{url('frontend/img/stepper-3.png')}}" alt="stepper">
        </div>
        <div class="text-center">
            <div class="container">
                <h1>Yay! Completed</h1>
                <p>Kami akan memberitahu Anda pada dashboard akun anda nanti setelah transaksi telah diterima</p>
                <a href="{{route('dashboard')}}"><button type="button" class="btn btn-grey text-grey">Back To Home</button><br></a>
            </div>
        </div>
    </div>
</section>
@endsection
