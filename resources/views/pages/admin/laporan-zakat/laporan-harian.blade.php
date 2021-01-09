<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ZakatKita - Laporan Harian ({{$tahun}})</title>
</head>

<body>
    <section class="my-5">
        <div class="text-center">
            <span style="font-size: 40px;"><span style="color: #28DF99; font-size: 40px;">Zakat</span>Kita.</span>
        </div>
    </section>
    <table class="table table-bordered mb-5">
        <thead>
            <tr style="background-color: #eafbf5;">
                <th scope="col">Tanggal</th>
                <th scope="col">Total Muzakki</th>
                <th scope="col">Total Transaksi</th>
                <th scope="col">Total Zakat Mal</th>
                <th scope="col">Total Zakat Penghasilan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$tahun}}</td>
                <td>{{$totalMuzakki}}</td>
                <td>{{$totalTransaksi}}</td>
                <td>@currency($totalZakatMal)</td>
                <td>@currency($totalZakatPenghasilan)</td>
            </tr>
        </tbody>
    </table>

    <h4>Data</h4>
    <table class="table table-bordered">
        <thead>
            <tr style="background-color: #eafbf5;">
                <th scope="col">Id Invoice</th>
                <th scope="col">Nama Pengirim</th>
                <!-- <th scope="col">Asal Bank</th> -->
                <th scope="col">Jenis Zakat</th>
                <th scope="col">Nominal</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)

            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nama_pengirim}}</td>
                <!-- <td>{{$item->asal_bank}}</td> -->
                <td>{{$item->jenis_zakat}}</td>
                <td>@currency($item->nominal)</td>
                <td>{{$item->created_at->format('d F Y')}}</td>
                <td>{{$item->status}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
