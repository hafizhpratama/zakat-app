<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <img style="width: 100%;" class="img-fluid px-3" src="{{url('frontend/img/ZakatKita.png')}}" alt="">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Zakat
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('data-zakat')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Zakat</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/data-zakat/emas/edit/1')}}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Harga Emas</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/pengeluaran')}}">
            <i class="fas fa-hand-holding-heart"></i>
            <span>Pengeluaran</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/data-zakat/laporan-zakat-form')}}">
            <i class="fas fa-fw fa fa-bookmark"></i>
            <span>Laporan Zakat</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/data-zakat/laporan-pengeluaran-form')}}">
            <i class="fas fa-fw fa fa-bookmark"></i>
            <span>Laporan Pengeluaran</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
