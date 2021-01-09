@extends('layouts.web')

@section('content')
<section class="my-5">
    <div class="container">
        <div class="text-center mb-4">
            <img src="{{url('frontend/img/stepper-1.png')}}" alt="stepper">
        </div>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                aria-controls="nav-home" aria-selected="true">Zakat Penghasilan</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                aria-controls="nav-profile" aria-selected="false">Zakat Maal</a>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row justify-content-md-center">
                    <div class="my-4 col-lg-6">
                        <h2 class="font-weight-bold">Zakat Penghasilan</h2>
                        <p>Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat maal
                            yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari
                            pekerjaan yang tidak melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per
                            tahun. Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan dapat
                            ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara dengan nilai
                            seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi apabila penghasilan setiap bulan
                            telah melebihi nilai nishab bulanan, maka wajib dikeluarkan zakatnya sebesar 2,5% dari
                            penghasilannya tersebut. (Sumber: Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri
                            Agama Nomer 31 Tahun 2019, Fatwa MUI Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).
                        </p>
                        <form name="zakatPenghasilan" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Penghasilan Perbulan</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="penghasilanPerbulan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Penghasilan Lainnya Perbulan</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="penghasilanPerbulanLainnya"
                                        required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Harga Emas Saat Ini</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" value="{{$harga_emas}}" required
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nisab Saat Ini</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" value="{{($harga_emas*85)/12}}"
                                        required readonly>
                                </div>
                            </div>
                            <input class="btn btn-warning text-white mt-2" type="button"
                                onclick="hitungZakatPenghasilan()" value="Hitung Zakat">
                            <input class="btn btn-outline-warning mt-2" type="button" onclick="clearZakatPenghasilan()"
                                value="Hitung Ulang">
                            @if ($zakatspertahun==0 && $zakatsperbulan<12)
                                <button type="submit" class="btn btn-green text-white mt-2"
                                formaction="{{ route('hitung-zakat-perbulan-post') }}">Bayar Zakat Perbulan</button>
                                @endif
                                @if ($zakatspertahun==0 && $zakatsperbulan<12)
                                <button type="submit" class="btn btn-green text-white mt-2"
                                    formaction="{{ route('hitung-zakat-pertahun-post') }}">Bayar Zakat Pertahun</button>
                                @endif
                                <div class="my-4">
                                    <h4 class="font-weight-bold">Nisab Zakat Penghasilan</h4>
                                    <p>Nisab adalah syarat jumlah minimum (ambang batas) harta yang dapat dikategorikan
                                        sebagai
                                        harta wajib zakat. Untuk penghasilan yang diwajibkan zakat adalah penghasilan
                                        yang
                                        berada diatas nisab. Nisab Zakat Penghasilan adalah setara 85 gram emas.
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Zakat Penghasilan Yang Harus Anda Keluarkan Perbulan</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input class="form-control" type="number" name="hasilPerbulan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Zakat Penghasilan Yang Harus Anda Keluarkan Pertahun</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input class="form-control" type="number" name="hasilPertahun" readonly>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row justify-content-md-center">
                    <div class="my-4 col-lg-6">
                        <h2 class="font-weight-bold">Zakat Mal</h2>
                        <p>Zakat maal yang dimaksud dalam perhitungan ini adalah zakat yang dikenakan atas uang, emas,
                            surat berharga, dan aset yang disewakan. Tidak termasuk harta pertanian, pertambangan, dan
                            lain-lain yang diatur dalam UU No.23/2011 tentang pengelolaan zakat. Zakat maal harus sudah
                            mencapai nishab (batas minimum) dan terbebas dari hutang serta kepemilikan telah mencapai 1
                            tahun (haul). Nishab zakat maal sebesar 85 gram emas. Kadar zakatnya senilai 2,5%. (Sumber:
                            Al Qur'an Surah Al Baqarah ayat 267, Peraturan Menteri Agama Nomer 31 Tahun 2019, Fatwa MUI
                            Nomer 3 Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</p>
                        <form name="zakatMal" action="{{ route('hitung-zakat-post') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Nilai Emas</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="number" class="form-control" name="nilaiEmas" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">gram</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai Tabungan</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="nilaiTabungan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai Aset</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="nilaiAset" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Hutang</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="jumlahHutang" required>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="haulsudah"
                                    value="option1" checked>
                                <label class="form-check-label">
                                    Kepemilikannya harta sudah mencapai minimal 1 tahun
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="haulbelum"
                                    value="option2">
                                <label class="form-check-label">
                                    Kepemilikannya harta belum mencapai minimal 1 tahun
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <label>Harga Emas Saat Ini</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" value="{{$harga_emas}}" required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nisab Saat Ini</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" value="{{$harga_emas*85}}" required
                                        readonly>
                                </div>
                            </div>
                            <input type="button" class="btn btn-warning text-white mt-3" onclick="hitungZakatMal()"
                                value="Hitung Zakat">
                            <input class="btn btn-outline-warning mt-3" type="button" onclick="clearZakatMal()"
                                value="Hitung Ulang">
                            @if ($zakats==0)
                            <button type="submit" class="btn btn-green text-white mt-3">Bayar Zakat</button>
                            @endif
                            <div class="my-4">
                                <h4 class="font-weight-bold">Nisab Zakat Harta (Maal)</h4>
                                <p>Untuk harta yang diwajibkan zakat adalah harta yang berjumlah diatas nisab. Nisab
                                    Zakat
                                    Harta (Maal) adalah setara dengan 85 gr emas.</p>
                            </div>
                            <div class="form-group">
                                <label>Zakat Mal yang Harus Anda Keluarkan</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" class="form-control" name="hasil" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function hitungZakatMal() {
        var angkaSatu = parseInt(document.zakatMal.nilaiEmas.value);
        var angkaDua = parseInt(document.zakatMal.nilaiTabungan.value);
        var angkaTiga = parseInt(document.zakatMal.nilaiAset.value);
        var angkaEmpat = parseInt(document.zakatMal.jumlahHutang.value);
        var total;

        var harga_emas = "{{$harga_emas}}";
        total = (angkaSatu * "{{$harga_emas}}") + angkaDua + angkaTiga - angkaEmpat;

        if (document.zakatMal.nilaiEmas.value == "" || document.zakatMal.nilaiEmas.value == null) {
            alert("Nilai emas tidak boleh kosong. Jika tidak memiliki emas, bisa diisi 0");
        } else if (document.zakatMal.nilaiAset.value == "" || document.zakatMal.nilaiAset.value == null) {
            alert("Nilai aset tidak boleh kosong. Jika tidak memiliki aset, bisa diisi 0");
        } else if (document.zakatMal.nilaiTabungan.value == "" || document.zakatMal.nilaiTabungan.value == null) {
            alert("Nilai tabungan tidak boleh kosong. Jika tidak memiliki tabungan, bisa diisi 0");
        } else if (document.zakatMal.jumlahHutang.value == "" || document.zakatMal.jumlahHutang.value == null) {
            alert("Jumlah Hutang tidak boleh kosong. Jika tidak memiliki Jumlah Hutang, bisa diisi 0");
        }

        if (document.getElementById('haulbelum').checked || total < (harga_emas * 85)) {
            alert("Anda belum berhak menunaikan Zakat Mal");
        } else {
            document.zakatMal.hasil.value = total * 0.025;
        }
    }

    function hitungZakatPenghasilan() {
        var angkaSatu = parseInt(document.zakatPenghasilan.penghasilanPerbulan.value);
        var angkaDua = parseInt(document.zakatPenghasilan.penghasilanPerbulanLainnya.value);
        var total;

        total = angkaSatu + angkaDua;

        if (document.zakatPenghasilan.penghasilanPerbulan.value == "" || document.zakatPenghasilan.penghasilanPerbulan
            .value ==
            null) {
            alert("Penghasilan Perbulan tidak boleh kosong");
        } else if (document.zakatPenghasilan.penghasilanPerbulanLainnya.value == "" || document.zakatPenghasilan
            .penghasilanPerbulanLainnya.value == null) {
            alert("Penghasilan Perbulan Lainnya tidak boleh kosong");
        }

        if (total < ("{{$harga_emas}}" * 85) / 12) {
            alert("Maaf harta yang anda miliki belum mencapai nishab (batas) Zakat Penghasilan");
        } else {
            document.zakatPenghasilan.hasilPerbulan.value = total * 0.025;
            document.zakatPenghasilan.hasilPertahun.value = (total * 0.025) * 12;
        }
    }



    function clearZakatPenghasilan() {
        document.zakatPenghasilan.penghasilanPerbulan.value = '';
        document.zakatPenghasilan.penghasilanPerbulanLainnya.value = '';
    }

    function clearZakatMal() {
        document.zakatMal.nilaiEmas.value = '';
        document.zakatMal.nilaiTabungan.value = '';
        document.zakatMal.nilaiAset.value = '';
        document.zakatMal.jumlahHutang.value = '';
    }

</script>
@endsection
