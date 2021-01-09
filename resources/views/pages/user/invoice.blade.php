<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        /* .table td,
        .table th {
            padding: 0px;
            border-top: 0px;
        } */
    </style>
    <title>ZakatKita - Invoice</title>
</head>

<body>
    <section class="my-5">
        <div class="text-center">
            <span style="font-size: 40px;"><span style="color: #28DF99; font-size: 40px;">Zakat</span>Kita.</span>
        </div>
    </section>
    <section>
        <table>
            <tbody>
                <tr>
                    <td class="py-0 border-0" style="width: 120px;"><span>Nomor Invoice</span></td>
                    <td class="py-0 border-0"><span>: {{$item->id}}</span></td>
                </tr>
                <tr>
                    <td class="py-0 border-0" style="width: 120px;"><span>Atas Nama</span></td>
                    <td class="py-0 border-0"><span>: {{$item->nama_pengirim}}</span></td>
                </tr>
                <tr>
                    <td class="py-0 border-0"><span>Tanggal</span></td>
                    <td class="py-0 border-0"><span>: {{$item->created_at->format('d M Y')}}</span></td>
                </tr>
                <tr>
                    <td class="py-0 border-0"><span>Bank Asal</span></td>
                    <td class="py-0 border-0"><span>: {{$item->asal_bank}}</span></td>
                </tr>
                <tr>
                    <td class="py-0 border-0"><span>Bank Tujuan</span></td>
                    <td class="py-0 border-0"><span>: Bank Mandiri Syariah</span></td>
                </tr>
                <tr>
                    <td class="py-0 border-0"><span>Status</span></td>
                    <td class="py-0 border-0"><span>: </span><span class="font-weight-bold">{{$item->status}}</span></td>
                </tr>
            </tbody>
        </table>
    </section>
    <section class="mt-5">
        <table class="table">
            <tbody>
                <tr>
                    <td class="py-3 border-left" colspan="2" style="background-color: #eafbf5;"><span class="font-weight-bold">Ringkasan Pembayaran (Invoice)</span></td>
                    <td class="py-3 border-right" style="background-color: #eafbf5;"></td>
                </tr>
                <tr>
                    <td class="py-3 border-left"><span>{{$item->jenis_zakat}}</span></td>
                    <td></td>
                    <td class="py-3 text-right border-right"><span>@currency($item->nominal)</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="background-color: #eafbf5;" class="py-3 border-left border-bottom"><span class="font-weight-bold" style="color: #28DF99;">Total Bayar</span></td>
                    <td style="background-color: #eafbf5;" class="py-3 text-right border-bottom border-right"><span class="font-weight-bold" style="color: #28DF99;">@currency($item->nominal)</span></td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
