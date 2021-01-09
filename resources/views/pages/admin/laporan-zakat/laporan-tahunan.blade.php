<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ZakatKita - Laporan Tahunan ({{$tahun}})</title>
</head>

<body>
    <section class="my-5">
        <div class="text-center">
        <span style="font-size: 40px;"><span style="color: #28DF99; font-size: 40px;">Zakat</span>Kita.</span>
        </div>
    </section>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: #eafbf5;">
                    <th scope="col">Tahun</th>
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
</body>
