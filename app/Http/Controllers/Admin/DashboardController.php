<?php

namespace App\Http\Controllers\Admin;

use App\BayarZakat;
use App\HargaEmas;
use App\Http\Controllers\Controller;
use App\Pengeluaran;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = date("Y");
        $items = HargaEmas::all();
        $pengeluaran = Pengeluaran::where('deleted_at', NULL)->where('created_at', 'LIKE', '%' . $year . '%')->sum('nominal');
        $jumlah = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $year . '%')->sum('nominal');
        $lunas = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $year . '%')->count();
        $proses = BayarZakat::where('status', 'Proses Verifikasi')->where('created_at', 'LIKE', '%' . $year . '%')->count();
        $user = User::where('roles', 'USER')->count();

        // $sqlquery = "select monthname(created_at) AS bulan, sum(nominal) AS nominal
        // from pembayaran_zakat
        // group by year(created_at), monthname(created_at)
        // order by year(created_at),monthname(created_at) DESC";

        $year = date("Y-m-d", strtotime('01/01'));

        $sqlquery = "SELECT MONTHNAME(CONCAT('2020-',i.mm,'-01')) AS `bulan`,
        IFNULL(SUM(o.nominal),0) AS `nominal`
            FROM ( SELECT '01' AS mm
            UNION ALL SELECT '02'
            UNION ALL SELECT '03'
            UNION ALL SELECT '04'
            UNION ALL SELECT '05'
            UNION ALL SELECT '06'
            UNION ALL SELECT '07'
            UNION ALL SELECT '08'
            UNION ALL SELECT '09'
            UNION ALL SELECT '10'
            UNION ALL SELECT '11'
            UNION ALL SELECT '12'
          ) i
        LEFT
        JOIN `pembayaran_zakat` o
        ON o.created_at >= '$year' + INTERVAL ( i.mm - 1 ) MONTH
        AND o.created_at  < '$year' + INTERVAL ( i.mm + 0 ) MONTH
        AND o.status = 'lunas'
        AND o.deleted_at IS NULL
        GROUP BY i.mm";

        $data = DB::select(DB::raw($sqlquery));
        // $data = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $year . '%')->get();

        $charts = [];

        foreach ($data as $item) {
            $charts[] = $item->nominal;
            $bulan[] = $item->bulan;
        }

        // dd($data);

        // echo $items;
        return view('pages.admin.dashboard', [
            'user' => $user,
            'jumlah' => $jumlah,
            'lunas' => $lunas,
            'proses' => $proses,
            'items' => $items,
            'charts' => $charts,
            'bulan' => $bulan,
            'pengeluaran' => $pengeluaran
        ]);
    }

    public function laporan_tahunan()
    {
        $year = date("Y");
        $totalZakatMal = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Mal')->where('created_at', 'LIKE', '%' . $year . '%')->sum('nominal');
        $totalZakatPenghasilan = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Penghasilan (Perbulan)', 'Zakat Penghasilan (Pertahun)')->where('created_at', 'LIKE', '%' . $year . '%')->sum('nominal');
        $totalTransaksi = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $year . '%')->count();
        $totalMuzakki = User::where('roles', 'USER')->where('created_at', 'LIKE', '%' . $year . '%')->count();

        set_time_limit(300);
        $pdf = PDF::loadView('pages.admin.laporan-zakat.laporan-tahunan', [
            'tahun' => $year,
            'totalZakatMal' => $totalZakatMal,
            'totalZakatPenghasilan' => $totalZakatPenghasilan,
            'totalTransaksi' => $totalTransaksi,
            'totalMuzakki' => $totalMuzakki
        ]);
        return $pdf->stream();

        // return view('pages.admin.laporan-tahunan',[
        //     'tahun' => $year,
        //     'totalZakatMal' => $totalZakatMal,
        //     'totalZakatPenghasilan' => $totalZakatPenghasilan,
        //     'totalTransaksi' => $totalTransaksi,
        //     'totalMuzakki' => $totalMuzakki
        // ]);
    }

    public function laporan_harian()
    {
        $tanggal = date("Y-m-d");
        // $tanggal = "2020-12-07";
        $totalMuzakki = User::where('roles', 'USER')->where('created_at', 'LIKE', '%' . $tanggal . '%')->count();
        $totalZakatMal = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Mal')->where('created_at', 'LIKE', '%' . $tanggal . '%')->sum('nominal');
        $totalZakatPenghasilan = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Penghasilan (Perbulan)', 'Zakat Penghasilan (Pertahun)')->where('created_at', 'LIKE', '%' . $tanggal . '%')->sum('nominal');
        $totalTransaksi = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $tanggal . '%')->count();
        $items = BayarZakat::where('created_at', 'LIKE', '%' . $tanggal . '%')->where('status', 'Lunas')->orderBy('created_at', 'desc')->get();

        // echo $items;

        set_time_limit(300);
        $pdf = PDF::loadView('pages.admin.laporan-zakat.laporan-harian', [
            'tahun' => $tanggal,
            'totalZakatMal' => $totalZakatMal,
            'totalZakatPenghasilan' => $totalZakatPenghasilan,
            'totalTransaksi' => $totalTransaksi,
            'totalMuzakki' => $totalMuzakki,
            'items' => $items
        ]);
        return $pdf->stream();

        // return view('pages.admin.laporan-tahunan',[
        //     'tahun' => $year,
        //     'totalZakatMal' => $totalZakatMal,
        //     'totalZakatPenghasilan' => $totalZakatPenghasilan,
        //     'totalTransaksi' => $totalTransaksi,
        //     'totalMuzakki' => $totalMuzakki
        // ]);
    }

    public function laporan_bulanan()
    {
        $tanggal = date("Y-m");
        $bulan = date("F Y");
        // $tanggal = "2020-12-07";
        $totalMuzakki = User::where('roles', 'USER')->where('created_at', 'LIKE', '%' . $tanggal . '%')->count();
        $totalZakatMal = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Mal')->where('created_at', 'LIKE', '%' . $tanggal . '%')->sum('nominal');
        $totalZakatPenghasilan = BayarZakat::where('status', 'Lunas')->where('jenis_zakat', 'Zakat Penghasilan (Perbulan)', 'Zakat Penghasilan (Pertahun)')->where('created_at', 'LIKE', '%' . $tanggal . '%')->sum('nominal');
        $totalTransaksi = BayarZakat::where('status', 'Lunas')->where('created_at', 'LIKE', '%' . $tanggal . '%')->count();

        // echo $items;

        set_time_limit(300);
        $pdf = PDF::loadView('pages.admin.laporan-zakat.laporan-bulanan', [
            'tahun' => $bulan,
            'totalZakatMal' => $totalZakatMal,
            'totalZakatPenghasilan' => $totalZakatPenghasilan,
            'totalTransaksi' => $totalTransaksi,
            'totalMuzakki' => $totalMuzakki,
        ]);
        return $pdf->stream();

        // return view('pages.admin.laporan-tahunan',[
        //     'tahun' => $year,
        //     'totalZakatMal' => $totalZakatMal,
        //     'totalZakatPenghasilan' => $totalZakatPenghasilan,
        //     'totalTransaksi' => $totalTransaksi,
        //     'totalMuzakki' => $totalMuzakki
        // ]);
    }

    public function laporan_zakat_form()
    {
        return view('pages.admin.laporan-zakat.laporan');
    }

    public function laporan_pengeluaran_form()
    {
        return view('pages.admin.laporan-pengeluaran.laporan');
    }

    public function laporan_zakat_custom($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $items = BayarZakat::whereBetween('created_at', [$tglawal, $tglakhir])->where('status', 'Lunas')->orderBy('created_at', 'desc')->get();

        set_time_limit(300);
        $pdf = PDF::loadView('pages.admin.laporan-zakat.laporan-custom', [
            'items' => $items,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ]);
        return $pdf->stream();

        // return view('pages.admin.laporan-custom', [
        //     'items' => $items,
        //     'tglawal' => $tglawal,
        //     'tglakhir' => $tglakhir
        // ]);
    }

    public function laporan_pengeluaran_custom($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $items = Pengeluaran::whereBetween('created_at', [$tglawal, $tglakhir])->where('deleted_at', NULL)->orderBy('created_at', 'desc')->get();

        set_time_limit(300);
        $pdf = PDF::loadView('pages.admin.laporan-pengeluaran.laporan-custom', [
            'items' => $items,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ]);
        return $pdf->stream();

        // return view('pages.admin.laporan-custom', [
        //     'items' => $items,
        //     'tglawal' => $tglawal,
        //     'tglakhir' => $tglakhir
        // ]);
    }
}
