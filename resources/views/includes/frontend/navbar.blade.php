<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img style="width: 100%;" class="img-fluid" src="{{url('frontend/img/ZakatKita.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('hitung-zakat')}}">Hitung Zakat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('user/bayar-zakat')}}">Bayar Zakat</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">Masuk</a>
                </li>
                @endguest

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('/user')}}">Akun</a>
                        <form action="{{url('logout')}}" method="POST">
                            @csrf
                            <button class="dropdown-item text-white" style="background-color: #E74C3C;" type="submit">Keluar</button>
                        </form>
                    </div>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
