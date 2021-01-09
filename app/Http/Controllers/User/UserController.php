<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BayarZakat;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $items = BayarZakat::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.user.dashboard', [
            'items' => $items,
        ]);
    }

    // Overloading pada class PHP ditujukan untuk pembuatan property yang dinamis pada class PHP.
    // Dengan overloading pada class PHP ini kita dapat membuat public variable baru maupun public method baru pada saat pembuatan object.
    public function invoice($id)
    {
        $item = BayarZakat::findOrFail($id);
        // return view('pages.user.invoice', [
        //     'item' => $item
        // ]);

        $pdf = PDF::loadView('pages.user.invoice', [
            'item' => $item
        ]);
        return $pdf->stream();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $items = BayarZakat::where('users_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')->where('jenis_zakat', 'like', "%" . $search . "%")
                ->orWhere('asal_bank', 'like', "%" . $search . "%")->orWhere('nama_pengirim', 'like', "%" . $search . "%")
                ->orWhere('id', 'like', "%" . $search . "%")->orWhere('status', 'like', "%" . $search . "%")->paginate(5);

        return view('pages.user.dashboard', [
            'items' => $items,
        ]);
    }
}
