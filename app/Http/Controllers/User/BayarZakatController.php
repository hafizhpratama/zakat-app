<?php

namespace App\Http\Controllers\User;

use App\BayarZakat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\BayarZakatRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BayarZakatController extends Controller
{
    public function index()
    {

        if(!session('bayarzakat')) {
            return redirect(route('hitung-zakat'));
        }

        // echo $zakats;
        $totalbayar = session('bayarzakat');
        $jeniszakat = session('jeniszakat');

        return view('pages.user.bayar-zakat', [
            'jeniszakat' => $jeniszakat,
            'bayar' => $totalbayar,
        ]);
    }

    public function create()
    {
        return view('bayar-zakat');
    }

    public function store(BayarZakatRequest $request)
    {

        // $request->user_id = Auth::user()->id;
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );
        $data['users_id'] = Auth::user()->id;


        BayarZakat::create($data);
        session()->flash('bayarzakat', true);
        return redirect()->route('success');
    }
}
