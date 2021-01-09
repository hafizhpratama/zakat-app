<?php

namespace App\Http\Controllers;

use App\BayarZakat;
use App\HargaEmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HitungZakatController extends Controller
{
    public function index(){

        $zakats = 0;
        $zakatspertahun = 0;
        $zakatsperbulan = 0;

        if (Auth::check()) {
            $year = date("Y");
            $zakats = BayarZakat::where('users_id', Auth::user()->id)->where('jenis_zakat', 'Zakat Mal')->where('created_at', 'LIKE', '%' . $year . '%')->count();
            $zakatspertahun = BayarZakat::where('users_id', Auth::user()->id)->where('jenis_zakat', 'Zakat Penghasilan (Pertahun)')->where('created_at', 'LIKE', '%' . $year . '%')->where('deleted_at', NULL)->count();
            $zakatsperbulan = BayarZakat::where('users_id', Auth::user()->id)->where('jenis_zakat', 'Zakat Penghasilan (Perbulan)')->where('created_at', 'LIKE', '%' . $year . '%')->where('deleted_at', NULL)->count();
        }

        return view('hitung-zakat', [
            'harga_emas' => $this->harga_emas(),
            'zakatspertahun' => $zakatspertahun,
            'zakatsperbulan' => $zakatsperbulan,
            'zakats' => $zakats,
        ]);
    }

    public function harga_emas(){
        return HargaEmas::first()->harga_emas;
    }

    public function hitung_mal(Request $request)
    {
        $nilaiEmas = $request->nilaiEmas;
        $nilaiTabungan = $request->nilaiTabungan;
        $nilaiAset = $request->nilaiAset;
        $jumlahHutang = $request->jumlahHutang;
        $harga_emas = $this->harga_emas();
        $total = (($nilaiEmas * $harga_emas) + $nilaiTabungan + $nilaiAset - $jumlahHutang) * 0.025;

        $jeniszakat = "Zakat Mal";
        // dd($total);
        session(['jeniszakat' => $jeniszakat]);
        session(['bayarzakat'=>$total]);
        return redirect(route('bayar-zakat'));
    }

    public function hitung_perbulan(Request $request)
    {
        $penghasilanPerbulan = $request->penghasilanPerbulan;
        $penghasilanPerbulanLainnya = $request->penghasilanPerbulanLainnya;

        $total = ($penghasilanPerbulan + $penghasilanPerbulanLainnya) * 0.025;

        $jeniszakat = "Zakat Penghasilan (Perbulan)";
        // dd($total);
        session(['jeniszakat' => $jeniszakat]);
        session(['bayarzakat'=>$total]);
        return redirect(route('bayar-zakat'));
    }

    public function hitung_pertahun(Request $request)
    {
        $penghasilanPerbulan = $request->penghasilanPerbulan;
        $penghasilanPerbulanLainnya = $request->penghasilanPerbulanLainnya;
        $total = ($penghasilanPerbulan + $penghasilanPerbulanLainnya) * 0.025;
        $totalpertahun = $total * 12;

        $jeniszakat = "Zakat Penghasilan (Pertahun)";
        // dd($total);
        session(['jeniszakat' => $jeniszakat]);
        session(['bayarzakat'=>$totalpertahun]);
        return redirect(route('bayar-zakat'));
    }

}
